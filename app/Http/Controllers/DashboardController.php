<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = KategoriAset::count();
        $totalLokasi = Lokasi::count();
        $totalUser = User::count();

        // Kategori list untuk chart
        $kategoriList = KategoriAset::select('nama_kategori')->get()->pluck('nama_kategori');

        return view('pages.dashboard.dashboard', compact(
            'totalKategori',
            'totalLokasi',
            'totalUser',
            'kategoriList',
        ));
    }
}
