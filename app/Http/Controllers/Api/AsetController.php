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
        $aset = Aset::with(['kategori', 'lokasi'])->get();
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
            'kode_aset' => 'required|string|max:255|unique:aset',
            'nama_aset' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_aset,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'jumlah' => 'required|integer',
            'tanggal_perolehan' => 'nullable|date',
            'harga_perolehan' => 'nullable|numeric',
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
        $aset->load(['kategori', 'lokasi', 'mutasiAsets']);
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
            'kode_aset' => 'required|string|max:255|unique:aset,kode_aset,' . $aset->id,
            'nama_aset' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_aset,id',
            'lokasi_id' => 'required|exists:lokasi,id',
            'kondisi' => 'required|in:baik,rusak,hilang',
            'jumlah' => 'required|integer',
            'tanggal_perolehan' => 'nullable|date',
            'harga_perolehan' => 'nullable|numeric',
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
