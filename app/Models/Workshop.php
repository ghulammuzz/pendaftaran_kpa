<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_workshop';

    protected $fillable = [
        'nama_lengkap',
        'no_identitas',
        'npsn',
        'nama_instansi',
        'no_hp',
        'jenis_acara',
        'status',
        'pernyataan',
        'created_up',
        'updated_at',
    ];
}
