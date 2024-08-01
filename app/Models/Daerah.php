<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis', 'provinsi', 'luas_wilayah', 'jumlah_penduduk'];

    /**
     * Mendapatkan semua calon yang terkait dengan daerah ini.
     */
    public function calons()
    {
        return $this->hasMany(Calon::class);
    }

    /**
     * Scope a query to only include kabupaten.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKabupaten($query)
    {
        return $query->where('jenis', 'kabupaten');
    }

    /**
     * Scope a query to only include kota.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKota($query)
    {
        return $query->where('jenis', 'kota');
    }

    /**
     * Get the formatted luas wilayah.
     *
     * @return string
     */
    public function getFormattedLuasWilayahAttribute()
    {
        return number_format($this->luas_wilayah, 2) . ' km²';
    }

    /**
     * Get the formatted jumlah penduduk.
     *
     * @return string
     */
    public function getFormattedJumlahPendudukAttribute()
    {
        return number_format($this->jumlah_penduduk);
    }
}
