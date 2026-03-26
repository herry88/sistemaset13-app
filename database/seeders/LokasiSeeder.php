<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;  

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy lokasi
        $lokasis = [
            ['nama_lokasi' => 'Gudang'],
            ['nama_lokasi' => 'Kantor'],
            ['nama_lokasi' => 'Cabang'],
            ['nama_lokasi' => 'Pabrik'],
            ['nama_lokasi' => 'Toko'],
        ];

        foreach ($lokasis as $lokasi) {
            Lokasi::create($lokasi);
        }
    }
}
