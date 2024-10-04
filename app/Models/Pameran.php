<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pameran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pameran';

    protected $fillable = [
        'nama_lengkap',
        'nama_instansi',
        'alamat',
        'no_hp',
        'jenis_usaha',
        'ukuran_tenda',
        'bukti_pembayaran',
        'pernyataan_1',
        'pernyataan_2',
        'pernyataan_3',
        'created_up',
        'updated_at',
    ];
}
