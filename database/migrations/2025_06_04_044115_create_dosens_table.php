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
        Schema::create('dosens', function (Blueprint $table) {
           $table->uuid('id');
            $table->primary('id');
            $table->string('nama', 30);
            $table->string('nidk', 10);
            $table->uuid('fakultas_id');
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('restrict')->onUpdate('restrict');
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
