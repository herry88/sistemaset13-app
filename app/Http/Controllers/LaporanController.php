<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use App\Models\Lokasi;
use App\Models\Aset;
use App\Models\MutasiAset;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }

    public function kategoriAset(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->tanggal_akhir ?? Carbon::now()->endOfMonth()->format('Y-m-d');

        $kategori = KategoriAset::withCount(['asets' => function ($query) use ($tanggalMulai, $tanggalAkhir) {
            $query->whereBetween('tanggal_perolehan', [$tanggalMulai, $tanggalAkhir]);
        }])->get();

        return view('pages.laporan.kategori_aset', compact('kategori', 'tanggalMulai', 'tanggalAkhir'));
    }

    public function lokasiAset(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->tanggal_akhir ?? Carbon::now()->endOfMonth()->format('Y-m-d');

        $lokasi = Lokasi::withCount(['asets' => function ($query) use ($tanggalMulai, $tanggalAkhir) {
            $query->whereBetween('tanggal_perolehan', [$tanggalMulai, $tanggalAkhir]);
        }])->get();

        return view('pages.laporan.lokasi_aset', compact('lokasi', 'tanggalMulai', 'tanggalAkhir'));
    }

    public function aset(Request $request)
    {
        $query = Aset::with(['kategori', 'lokasi']);

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->lokasi_id) {
            $query->where('lokasi_id', $request->lokasi_id);
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        if ($request->tanggal_mulai && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_perolehan', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $asets = $query->get();
        $kategori = KategoriAset::all();
        $lokasis = Lokasi::all();

        return view('pages.laporan.aset', compact('asets', 'kategori', 'lokasis', 'request'));
    }

    public function mutasiAset(Request $request)
    {
        $query = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user']);

        if ($request->aset_id) {
            $query->where('aset_id', $request->aset_id);
        }

        if ($request->tanggal_mulai && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_mutasi', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $mutasis = $query->orderBy('tanggal_mutasi', 'desc')->get();
        $asets = Aset::all();

        return view('pages.laporan.mutasi_aset', compact('mutasis', 'asets', 'request'));
    }

    public function exportKategoriAset(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->tanggal_akhir ?? Carbon::now()->endOfMonth()->format('Y-m-d');

        $kategori = KategoriAset::withCount(['asets' => function ($query) use ($tanggalMulai, $tanggalAkhir) {
            $query->whereBetween('tanggal_perolehan', [$tanggalMulai, $tanggalAkhir]);
        }])->get();

        $pdf = Pdf::loadView('pages.laporan.pdf.kategori_aset', compact('kategori', 'tanggalMulai', 'tanggalAkhir'));
        return $pdf->download('laporan-kategori-aset-' . date('Y-m-d') . '.pdf');
    }

    public function exportLokasiAset(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->tanggal_akhir ?? Carbon::now()->endOfMonth()->format('Y-m-d');

        $lokasi = Lokasi::withCount(['asets' => function ($query) use ($tanggalMulai, $tanggalAkhir) {
            $query->whereBetween('tanggal_perolehan', [$tanggalMulai, $tanggalAkhir]);
        }])->get();

        $pdf = Pdf::loadView('pages.laporan.pdf.lokasi_aset', compact('lokasi', 'tanggalMulai', 'tanggalAkhir'));
        return $pdf->download('laporan-lokasi-aset-' . date('Y-m-d') . '.pdf');
    }

    public function exportAset(Request $request)
    {
        $query = Aset::with(['kategori', 'lokasi']);

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->lokasi_id) {
            $query->where('lokasi_id', $request->lokasi_id);
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        if ($request->tanggal_mulai && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_perolehan', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $asets = $query->get();

        $pdf = Pdf::loadView('pages.laporan.pdf.aset', compact('asets'));
        return $pdf->download('laporan-aset-' . date('Y-m-d') . '.pdf');
    }

    public function exportMutasiAset(Request $request)
    {
        $query = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user']);

        if ($request->aset_id) {
            $query->where('aset_id', $request->aset_id);
        }

        if ($request->tanggal_mulai && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_mutasi', [$request->tanggal_mulai, $request->tanggal_akhir]);
        }

        $mutasis = $query->orderBy('tanggal_mutasi', 'desc')->get();

        $pdf = Pdf::loadView('pages.laporan.pdf.mutasi_aset', compact('mutasis'));
        return $pdf->download('laporan-mutasi-aset-' . date('Y-m-d') . '.pdf');
    }
}
