<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    use HasUuids;
    protected $fillable = ['nama', 'nidk', 'fakultas_id', 'prodi_id'];

     public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
