<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $mataKuliah = MataKuliah::all();
        return view('mataKuliah.index', compact('mataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mataKuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required|unique:mata_kuliahs',
            'prodi_id' => 'required',
        ]);

        MataKuliah::create($input);
        return redirect()->route('mataKuliah.index')->with('success', 'Mata Kuliah created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        $prodi = Prodi::all();
        return view('mataKuliah.edit', compact('mataKuliah', 'prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        return view('materi.edit', compact('materi', 'mataKuliah', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);

        MataKuliah::update($input);
        return redirect()->route('mataKuliah.index')->with('success', 'Mata Kuliah berhasil di ubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        
        $mataKuliah->delete();
        return redirect()->route('mataKuliah.index')->with('success', 'Mata Kuliah berhasil di hapus.');
    }
}
