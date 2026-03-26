<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAset = Aset::count();
        $totalKategori = KategoriAset::count();
        $totalLokasi = Lokasi::count();
        $totalUser = User::count();

        // Kategori list untuk chart - ambil kategori yang punya aset
        $kategoriData = KategoriAset::withCount('asets')->get();
        $kategoriList = $kategoriData->pluck('nama_kategori');
        $asetCounts = $kategoriData->pluck('asets_count');

        return view('pages.dashboard.dashboard', compact(
            'totalAset',
            'totalKategori',
            'totalLokasi',
            'totalUser',
            'kategoriList',
            'asetCounts'
        ));
    }
}
