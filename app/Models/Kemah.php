<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemah extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_kemah';

    protected $fillable = [
        'nama_lengkap',
        'no_identitas',
        'alamat',
        'pekerjaan',
        'email',
        'no_hp',
        'bidang',
        'pernyataan',
        'created_at',
        'updated_at',
    ];
}
