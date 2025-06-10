<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select('
            SELECT prodis.nama, COUNT(*) as jumlah
            FROM mahasiswas JOIN prodis ON mahasiswas.prodi_id = prodis.id
            GROUP BY prodis.nama
        ');

        $mahasiswaasalsma = DB::select('
            SELECT asal_sma, COUNT(*) as jumlah
            FROM mahasiswas
            GROUP BY asal_sma
        ');

        $mahasiswapertahun = DB::select('
            SELECT LEFT(npm, 2) as tahun, COUNT(*) as jumlah
            FROM mahasiswas
            GROUP BY LEFT(npm, 2)
        ');

        return view('dashboard.index', compact('mahasiswaprodi', 'mahasiswaasalsma', 'mahasiswapertahun'));
    }
}