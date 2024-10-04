<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_seminar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('status');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->boolean('pernyataan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_seminar');
    }
};
