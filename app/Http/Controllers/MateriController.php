<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    
    
      $mataKuliah = MataKuliah::all(); 
      $dosen = Dosen::all();
        return view('materi.create', compact('mataKuliah','dosen'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'matakuliah_id' => 'required|integer',
        'dosen_id' => 'required|integer',
        'pertemuan' => 'required|integer',
        'pokok_bahasan' => 'required|string',
        'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
    ]);

    if ($request->hasFile('file_materi')) {
        try {
            $file = $request->file('file_materi');
            $response = Http::asMultipart()->post(
                'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/raw/upload',
                [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'upload_preset',
                        'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                    ],
                ]
            );

            $result = $response->json();
            if (isset($result['secure_url'])) {
                $validated['file_materi'] = $result['secure_url'];
            } else {
                return back()->withErrors(['file_materi' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['file_materi' => 'Cloudinary error: ' . $e->getMessage()]);
        }
    }

        Materi::create($validated);
        return redirect()->route('materi.index')->with('success', 'Materi created successfully.');
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
        $validated = $request->validate([
        'matakuliah_id' => 'required|integer',
        'dosen_id' => 'required|integer',
        'pertemuan' => 'required|integer',
        'pokok_bahasan' => 'required|string',
        'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
    ]);

    if ($request->hasFile('file_materi')) {
        try {
            $file = $request->file('file_materi');
            $response = Http::asMultipart()->post(
                'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/raw/upload',
                [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'upload_preset',
                        'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                    ],
                ]
            );

            $result = $response->json();
            if (isset($result['secure_url'])) {
                $validated['file_materi'] = $result['secure_url'];
            } else {
                return back()->withErrors(['file_materi' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['file_materi' => 'Cloudinary error: ' . $e->getMessage()]);
        }
    }
        $materi->update($validated);
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
