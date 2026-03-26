<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriAset::all();
        return view('pages.kategori-aset.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori-aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        KategoriAset::create($request->all());

        return redirect()->route('kategori-aset.index')->with('success', 'Kategori aset berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriAset $kategoriAset)
    {
        return view('pages.kategori-aset.show', compact('kategoriAset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriAset $kategoriAset)
    {
        return view('pages.kategori-aset.edit', compact('kategoriAset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriAset $kategoriAset)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategoriAset->update($request->all());

        return redirect()->route('kategori-aset.index')->with('success', 'Kategori aset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriAset $kategoriAset)
    {
        $kategoriAset->delete();

        return redirect()->route('kategori-aset.index')->with('success', 'Kategori aset berhasil dihapus.');
    }
}
