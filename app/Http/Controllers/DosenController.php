<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $dosen = new Dosen(); 
        return view('dosen.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required',
            'nidk' => 'required|unique:dosen',
            'prodi_id' => 'required',
            'fakultas_id' => 'required'
        ]);
         Dosen::create($input);
        return redirect()->route('dosen.index')
                         ->with('success', 'Dosen berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
         $fakultas = Fakultas::all();
         $prodi = Prodi::all();
        return view('dosen.edit', compact('dosen', 'fakultas','prodi'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
         $dosen = Dosen::findOrFail($dosen);
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $input = $request->validate([
            'nama' => 'required',
            'nidk' => 'required',
            'prodi_id' => 'required',
            'fakultas_id' => 'required'
        ]);

         return redirect()->route('dosen.index')
                         ->with('success', 'Dosen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen = Dosen::findOrFail($dosen);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil di hapus.');  
    }
}
