<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|unique:jadwal',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mataKuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required'
        ]);
         Jadwal::create($input);

        // redirect ke route fakultas.index
        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
    $mataKuliah = MataKuliah::all();
    $dosen = Dosen::all();
    $sesi = Sesi::all();
    return view('jadwal.edit', compact('jadwal', 'mataKuliah', 'dosen', 'sesi'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
         $jadwal = Jadwal::findOrFail($jadwal);
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
         $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mataKuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required'
        ]);
        $jadwal->update($input);
        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil di hapus.');  
    }
}
