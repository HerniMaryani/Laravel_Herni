<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_Kuliah = Mata_Kuliah::all();
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_Kuliah = Mata_Kuliah::all();
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required',
            'kode_mk' => 'required|unique:mata_kuliah',
            'prodi_id' => 'required',
        ]);
         Mata_Kuliah::create($input);

        // redirect ke route fakultas.index
        return redirect()->route('mata_kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mata_Kuliah $mata_Kuliah)
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.edit', compact('mata_kuliah', 'prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mata_Kuliah $mata_Kuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mata_Kuliah $mata_Kuliah)
    {
        $input = $request->validate([
            'nama' => 'required',
            'kode_mk' => 'required|unique:mata_kuliah',
            'prodi_id' => 'required',
        ]);
         $mata_Kuliah->update($input);

        // redirect ke route fakultas.index
        return redirect()->route('mata_kuliah.index')
                         ->with('success', 'Mata Kuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mata_Kuliah $mata_Kuliah)
    {
        //
    }
}
