<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
     use HasUuids;
    protected $table = 'mata_kuliahs';
    protected $fillable = ['kode_mk','nama','prodi_id'];

     public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
