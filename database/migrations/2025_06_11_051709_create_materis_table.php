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
        Schema::create('materis', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('mata_kuliahs')->onDelete('restrict')->onUpdate('restrict');
            $table->uuid('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('pertemuan');
            $table->string('pokok_bahasan');
            $table->string('file_materi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
