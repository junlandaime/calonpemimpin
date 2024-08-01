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
        Schema::create('daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['kabupaten', 'kota']);
            $table->string('provinsi')->default('Jawa Barat');
            $table->decimal('luas_wilayah', 10, 2); // dalam km²
            $table->integer('jumlah_penduduk');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daerahs');
    }
};
