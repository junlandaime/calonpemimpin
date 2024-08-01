<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'usia',
        'tempat_tanggal_lahir',
        'pendidikan',
        'pekerjaan',
        'jabatan',
        'partai',
        'visi',
        'misi',
        'prestasi',
        'program_unggulan',
        'pengalaman_organisasi',
        'publikasi',
        'foto_profil',
        'daerah_id'
    ];

    protected $casts = [
        'pendidikan' => 'array',
        'pekerjaan' => 'array',
        'misi' => 'array',
        'prestasi' => 'array',
        'program_unggulan' => 'array',
        'pengalaman_organisasi' => 'array',
        'publikasi' => 'array',
    ];

    // Relasi dengan model Daerah
    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }

    // Relasi dengan model Komentar
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    // Metode untuk mendapatkan usia calon
    public function getUsiaAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    // Metode untuk mendapatkan nama lengkap dengan gelar
    public function getNamaLengkapAttribute()
    {
        return $this->attributes['gelar_depan'] . ' ' . $this->attributes['nama'] . ' ' . $this->attributes['gelar_belakang'];
    }

    // Metode untuk mendapatkan ringkasan profil
    public function getRingkasanProfilAttribute()
    {
        return substr($this->attributes['visi'], 0, 100) . '...';
    }

    // Scope untuk filter berdasarkan daerah
    public function scopeDaerah($query, $daerahId)
    {
        return $query->where('daerah_id', $daerahId);
    }

    // Scope untuk filter berdasarkan partai
    public function scopePartai($query, $partai)
    {
        return $query->where('partai', $partai);
    }

    // Metode untuk menghitung jumlah suara (asumsi ada tabel suara)
    // public function jumlahSuara()
    // {
    //     return $this->hasMany(Suara::class)->count();
    // }

    // Metode untuk mengecek apakah calon memiliki program tertentu
    public function memilikiProgram($namaProgram)
    {
        return in_array($namaProgram, $this->program_unggulan);
    }
}
