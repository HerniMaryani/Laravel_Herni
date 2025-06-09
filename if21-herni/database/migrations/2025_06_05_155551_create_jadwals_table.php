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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('tahun_akademik');
            $table->string('kode_smt');    
            $table->string('kelas');
            $table->uuid('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliahs')->onDelete('restrict')->onUpdate('restrict');
            $table->uuid('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('restrict')->onUpdate('restrict');
            $table->uuid('sesi_id');
            $table->foreign('sesi_id')->references('id')->on('sesis')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
