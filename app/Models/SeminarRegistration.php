<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarRegistration extends Model
{
    use HasFactory;

    protected $table = 'seminar_registrations';
    
    protected $fillable = [
        'nama_lengkap',
        'email',
        'alamat',
        'nama_instansi',
        'no_hp',
        'status',
        'judul',
        'abstrak',
        'keywords',
        'bukti_pembayaran',
        'pernyataan',
    ];
}
