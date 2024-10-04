<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_kongres', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('penginapan');
            $table->string('pernyataan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_kongres');
    }
};
