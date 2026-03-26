<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutasiAsetController extends Controller
{
    public function index()
    {
        $mutasiAsets = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user'])
            ->latest()
            ->paginate(10);

        return view('pages.mutasi_aset.index', compact('mutasiAsets'));
    }

    public function create()
    {
        $asets = Aset::all();
        $lokasis = Lokasi::all();

        return view('pages.mutasi_aset.create', compact('asets', 'lokasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:lokasi,id',
            'lokasi_tujuan_id' => 'required|exists:lokasi,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        MutasiAset::create([
            'aset_id' => $request->aset_id,
            'lokasi_asal_id' => $request->lokasi_asal_id,
            'lokasi_tujuan_id' => $request->lokasi_tujuan_id,
            'tanggal_mutasi' => $request->tanggal_mutasi,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        // Update lokasi_id on aset
        Aset::where('id', $request->aset_id)->update(['lokasi_id' => $request->lokasi_tujuan_id]);

        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil dicatat');
    }

    public function show(MutasiAset $mutasiAset)
    {
        return view('pages.mutasi_aset.show', compact('mutasiAset'));
    }

    public function edit(MutasiAset $mutasiAset)
    {
        $asets = Aset::all();
        $lokasis = Lokasi::all();

        return view('pages.mutasi_aset.edit', compact('mutasiAset', 'asets', 'lokasis'));
    }

    public function update(Request $request, MutasiAset $mutasiAset)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:lokasi,id',
            'lokasi_tujuan_id' => 'required|exists:lokasi,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $mutasiAset->update($request->only(['aset_id', 'lokasi_asal_id', 'lokasi_tujuan_id', 'tanggal_mutasi', 'keterangan']));

        // Update lokasi_id on aset
        Aset::where('id', $request->aset_id)->update(['lokasi_id' => $request->lokasi_tujuan_id]);

        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil diperbarui');
    }

    public function destroy(MutasiAset $mutasiAset)
    {
        $mutasiAset->delete();

        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil dihapus');
    }
}

