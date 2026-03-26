<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MutasiAset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $mutasi = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan'])->get();
        return response()->json([
            'success' => true,
            'data' => $mutasi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'aset_id' => 'required|exists:asets,id',
            'lokasi_asal_id' => 'required|exists:lokasis,id',
            'lokasi_tujuan_id' => 'required|exists:lokasis,id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $mutasi = MutasiAset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mutasi aset berhasil ditambahkan.',
            'data' => $mutasi,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MutasiAset $mutasiAset): JsonResponse
    {
        $mutasiAset->load(['aset', 'lokasiAsal', 'lokasiTujuan']);
        return response()->json([
            'success' => true,
            'data' => $mutasiAset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MutasiAset $mutasiAset): JsonResponse
    {
        $validated = $request->validate([
            'aset_id' => 'required|exists:asets,id',
            'lokasi_asal_id' => 'required|exists:lokasis,id',
            'lokasi_tujuan_id' => 'required|exists:lokasis,id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $mutasiAset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mutasi aset berhasil diperbarui.',
            'data' => $mutasiAset,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MutasiAset $mutasiAset): JsonResponse
    {
        $mutasiAset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mutasi aset berhasil dihapus.',
        ]);
    }
}
