<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
     return redirect()->route('materi.index')
                         ->with('success', 'Jadwal berhasil disimpan');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->validate([
            'mata_kuliah_id' => 'required',
            'pertemuan' => ['required',
                 Rule::unique('materi')->where(function ($query) use ($request) {
                return $query->where('mata_kuliah_id', $request->mata_kuliah_id);
        }),
    ],
            'dosen_id' => 'required',
            'pokok_bahasan' => 'required',
            'file_materi' => 'required|file|mimes:pdf|max:2048',
        ]);
         if ($request->hasFile('file_materi')) {
            $file = $request->file('file_materi');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('file', $filename);

            $input['file_materi'] = $filename;
        }
         Materi::create($input);
        return redirect()->route('materi.index')->with('success', 'Materi Berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        return view('materi.edit', compact('materi', 'mataKuliah', 'dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
         $materi = Materi::findOrFail($materi);
        return view('materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $input = $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'pertemuan' => 'required',
            'pokok_bahasan' => 'required',
            'file_materi' => 'required|file|mimes:pdf|max:2048',
        ]);
         $materi->update($input);
        return redirect()->route('materi.index')->with('success', 'Materi Berhasil ditambah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil di hapus.');
    }
}
