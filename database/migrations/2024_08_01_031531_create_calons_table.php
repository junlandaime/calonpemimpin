<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daerah_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama')->nullable();
            $table->string('foto_profil')->nullable();
            $table->json('pendidikan');
            $table->json('pekerjaan');
            $table->string('jabatan');
            $table->string('partai');
            $table->text('visi');
            $table->json('misi');
            $table->json('prestasi')->nullable();
            $table->json('program_unggulan');
            $table->json('pengalaman_organisasi')->nullable();
            $table->json('publikasi')->nullable();
            $table->string('media_sosial')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
