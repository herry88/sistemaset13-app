<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aset;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy aset
        $asets = [
            [
                'kode_aset' => 'LT-001',
                'nama_aset' => 'Laptop Dell XPS 13',
                'kategori_id' => 1,
                'lokasi_id' => 1,
                'kondisi' => 'Baik',
                'jumlah' => 1,
                'tanggal_perolehan' => '2023-01-10',
                'harga_perolehan' => 15000000,
                'keterangan' => 'Laptop untuk keperluan kerja',
            ],
            [
                'kode_aset' => 'MJ-001',
                'nama_aset' => 'Meja Kantor',
                'kategori_id' => 2,
                'lokasi_id' => 2,
                'kondisi' => 'Baik',
                'jumlah' => 5,
                'tanggal_perolehan' => '2022-05-20',
                'harga_perolehan' => 2000000,
                'keterangan' => 'Meja kantor untuk ruang meeting',
            ],
            [
                'kode_aset' => 'KR-001',
                'nama_aset' => 'Mobil Toyota Avanza',
                'kategori_id' => 3,
                'lokasi_id' => 3,
                'kondisi' => 'Baik',
                'jumlah' => 1,
                'tanggal_perolehan' => '2021-08-15',
                'harga_perolehan' => 200000000,
                'keterangan' => 'Mobil operasional untuk keperluan dinas',
            ],
        ];

        foreach ($asets as $aset) {
            Aset::create($aset);
        }
        
    }
}
