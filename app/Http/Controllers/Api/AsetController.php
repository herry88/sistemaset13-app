<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $aset = Aset::with(['kategoriAset', 'lokasi'])->get();
        return response()->json([
            'success' => true,
            'data' => $aset,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'kode_aset' => 'required|string|max:255|unique:asets',
            'nama_aset' => 'required|string|max:255',
            'kategori_aset_id' => 'required|exists:kategori_asets,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'keterangan' => 'nullable|string',
        ]);

        $aset = Aset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil ditambahkan.',
            'data' => $aset,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset): JsonResponse
    {
        $aset->load(['kategoriAset', 'lokasi', 'mutasiAsets']);
        return response()->json([
            'success' => true,
            'data' => $aset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset): JsonResponse
    {
        $validated = $request->validate([
            'kode_aset' => 'required|string|max:255|unique:asets,kode_aset,' . $aset->id,
            'nama_aset' => 'required|string|max:255',
            'kategori_aset_id' => 'required|exists:kategori_asets,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'tanggal_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'keterangan' => 'nullable|string',
        ]);

        $aset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil diperbarui.',
            'data' => $aset,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset): JsonResponse
    {
        $aset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil dihapus.',
        ]);
    }
}
