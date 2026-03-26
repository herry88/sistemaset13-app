<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MutasiAset;

class MutasiAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy mutasi aset
        $mutasiAsets = [
            [
                'aset_id' => 1,
                'lokasi_asal_id' => 1,
                'lokasi_tujuan_id' => 2,
                'tanggal_mutasi' => '2024-01-15',
                'keterangan' => 'Mutasi dari Gudang ke Kantor',
                'user_id' => 1,
            ],
            [
                'aset_id' => 2,
                'lokasi_asal_id' => 2,
                'lokasi_tujuan_id' => 3,
                'tanggal_mutasi' => '2024-02-20',
                'keterangan' => 'Mutasi dari Kantor ke Cabang',
                'user_id' => 1,
            ],
            [
                'aset_id' => 3,
                'lokasi_asal_id' => 3,
                'lokasi_tujuan_id' => 1,
                'tanggal_mutasi' => '2024-03-10',
                'keterangan' => 'Mutasi dari Cabang ke Gudang',
                'user_id' => 1,
            ],
        ];

        foreach ($mutasiAsets as $mutasi) {
            MutasiAset::create($mutasi);
        }
    }
}
