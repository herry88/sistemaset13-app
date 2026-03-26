<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriAset;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy kategori aset
        $kategoriAsets = [
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Furniture'],
            ['nama_kategori' => 'Kendaraan'],
            ['nama_kategori' => 'Peralatan Kantor'],
            ['nama_kategori' => 'Peralatan IT'],
        ];

        foreach ($kategoriAsets as $kategori) {
            KategoriAset::create($kategori);
        }
    }
}
