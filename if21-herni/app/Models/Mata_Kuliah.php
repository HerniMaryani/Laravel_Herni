<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_Kuliah extends Model
{
        protected $fillable = [
        'nama',
        'kode_mk',
        'prodi_id'
    ];

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
