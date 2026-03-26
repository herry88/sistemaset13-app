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

        if ($mutasi->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Data mutasi aset tidak ditemukan.',
                'data' => [],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mutasi aset berhasil diambil.',
            'data' => $mutasi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:lokasi,id',
            'lokasi_tujuan_id' => 'required|exists:lokasi,id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Use authenticated user if available, otherwise use first user or null
        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        } elseif (!isset($validated['user_id'])) {
            $validated['user_id'] = \App\Models\User::first()?->id;
        }

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
    public function show($id): JsonResponse
    {
        $mutasiAset = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan'])->find($id);

        if (!$mutasiAset) {
            return response()->json([
                'success' => false,
                'message' => 'Data mutasi aset tidak ditemukan.',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mutasi aset berhasil diambil.',
            'data' => $mutasiAset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $mutasiAset = MutasiAset::find($id);

        if (!$mutasiAset) {
            return response()->json([
                'success' => false,
                'message' => 'Data mutasi aset tidak ditemukan.',
                'data' => null,
            ], 404);
        }

        $validated = $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:lokasi,id',
            'lokasi_tujuan_id' => 'required|exists:lokasi,id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
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
    public function destroy($id): JsonResponse
    {
        $mutasiAset = MutasiAset::find($id);

        if (!$mutasiAset) {
            return response()->json([
                'success' => false,
                'message' => 'Data mutasi aset tidak ditemukan.',
                'data' => null,
            ], 404);
        }

        $mutasiAset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mutasi aset berhasil dihapus.',
        ]);
    }
}
