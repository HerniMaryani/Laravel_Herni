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
        Schema::create('mata__kuliahs', function (Blueprint $table) {
             $table->uuid('id');
            $table->primary('id');
            $table->string('kode_mk', 30);
            $table->string('nama', 30);
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
        Schema::dropIfExists('mata__kuliahs');
    }
};
