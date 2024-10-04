<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_seminar';

    protected $fillable = [
        'nama_lengkap',
        'no_identitas',
        'status',
        'nama_instansi',
        'alamat',
        'no_hp',
        'pernyataan',
        'created_up',
        'updated_at',
    ];
}
