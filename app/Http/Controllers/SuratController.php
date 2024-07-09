<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::query();

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $surats = $query->get();
        return view('surats.index', compact('surats'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('surats.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori' => 'required|exists:categories,id',
            'judul' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        $filePath = $request->file('file')->store('public/surats');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'waktu_pengarsipan' => now(),
            'file_path' => $filePath
        ]);

        return redirect()->route('surats.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $categories = Category::all();
        return view('surats.edit', compact('surat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori' => 'required|exists:categories,id',
            'judul' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::delete($surat->file_path);
            $filePath = $request->file('file')->store('public/surats');
            $surat->file_path = $filePath;
        }

        $surat->nomor_surat = $request->nomor_surat;
        $surat->kategori = $request->kategori;
        $surat->judul = $request->judul;
        $surat->save();

        return redirect()->route('surats.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        Storage::delete($surat->file_path);
        $surat->delete();
        return redirect()->route('surats.index')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        return Storage::download($surat->file_path);
    }

    public function view($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surats.view', compact('surat'));
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surats.show', compact('surat'));
    }
}