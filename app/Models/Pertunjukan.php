<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertunjukan extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pertunjukan';

    protected $fillable = [
        'nama_lengkap',
        'nama_instansi',
        'alamat',
        'no_hp',
        'jenis_pertunjukan',
        'sinopsis',
        'jumlah_peserta',
        'kebutuhan',
        'pernyataan_1',
        'pernyataan_2',
        'pernyataan_3',
    ];
}
