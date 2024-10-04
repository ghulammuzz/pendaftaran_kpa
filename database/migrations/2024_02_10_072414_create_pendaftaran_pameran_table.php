<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_pameran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jenis_usaha');
            $table->string('ukuran_tenda');
            $table->string('bukti_pembayaran');
            $table->boolean('pernyataan_1');
            $table->boolean('pernyataan_2');
            $table->boolean('pernyataan_3');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_pameran');
    }
};
