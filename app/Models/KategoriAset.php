<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriAset extends Model
{
    use HasFactory;

    protected $table = 'kategori_aset';

    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];
}
