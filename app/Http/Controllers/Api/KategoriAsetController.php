<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriAset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $kategori = KategoriAset::all();
        return response()->json([
            'success' => true,
            'message' => 'Data kategori aset berhasil diambil.',
            'data' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategori = KategoriAset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kategori aset berhasil ditambahkan.',
            'data' => $kategori,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriAset $kategoriAset): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $kategoriAset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriAset $kategoriAset): JsonResponse
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategoriAset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kategori aset berhasil diperbarui.',
            'data' => $kategoriAset,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriAset $kategoriAset): JsonResponse
    {
        $kategoriAset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori aset berhasil dihapus.',
        ]);
    }
}
