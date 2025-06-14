<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $prodi = Prodi::all(); // SELECT * from prodi
        return view('prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validasi input form
        $input = $request->validate([
            'nama' => 'required|unique:prodis',
            'singkatan' => 'required',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required'
        ]);


        Prodi::create($input);

        return redirect()->route('prodi.index')
                         ->with('success', 'Program studi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
         $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $prodi = Prodi::findOrFail($prodi);

        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
          // validasi input form
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required'
        ]);

        $prodi->update($input);
        return redirect()->route('prodi.index')
                         ->with('success', 'Program studi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil di hapus.');
    }
}
