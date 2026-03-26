<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asets = Aset::with(['kategori', 'lokasi'])->latest()->get();
        return view('pages.aset.index', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriAset::all();
        $lokasi = Lokasi::all();
        return view('pages.aset.create', compact('kategori', 'lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|string|max:50|unique:aset,kode_aset',
            'nama_aset' => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategori_aset,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string|max:30',
            'jumlah' => 'required|integer|min:0',
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aset = Aset::with(['kategori', 'lokasi'])->findOrFail($id);
        return view('pages.aset.show', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aset = Aset::findOrFail($id);
        $kategori = KategoriAset::all();
        $lokasi = Lokasi::all();
        return view('pages.aset.edit', compact('aset', 'kategori', 'lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aset = Aset::findOrFail($id);

        $request->validate([
            'kode_aset' => 'required|string|max:50|unique:aset,kode_aset,' . $id,
            'nama_aset' => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategori_aset,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|string|max:30',
            'jumlah' => 'required|integer|min:0',
        ]);

        $aset->update($request->all());

        return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus.');
    }
}
