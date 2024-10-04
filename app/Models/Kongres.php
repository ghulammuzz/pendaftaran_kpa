<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kongres extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_kongres';

    protected $fillable = [
        'nama_lengkap',
        'no_identitas',
        'nama_instansi',
        'alamat',
        'no_hp',
        'penginapan',
        'pernyataan',
        'created_up',
        'updated_at',
    ];
}
