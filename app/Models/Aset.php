<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori_id',
        'lokasi_id',
        'kondisi',
        'jumlah',
        'tanggal_perolehan',
        'harga_perolehan',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }

    public function kategoriAset()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
