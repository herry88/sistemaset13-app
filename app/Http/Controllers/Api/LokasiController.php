<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $lokasi = Lokasi::all();
        return response()->json([
            'success' => true,
            'data' => $lokasi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $lokasi = Lokasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil ditambahkan.',
            'data' => $lokasi,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $lokasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi): JsonResponse
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $lokasi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil diperbarui.',
            'data' => $lokasi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi): JsonResponse
    {
        $lokasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lokasi berhasil dihapus.',
        ]);
    }
}
