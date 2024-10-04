<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_pertunjukan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_instansi');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jenis_pertunjukan');
            $table->text('sinopsis');
            $table->text('jumlah_peserta');
            $table->text('kebutuhan');
            $table->boolean('pernyataan_1');
            $table->boolean('pernyataan_2');
            $table->boolean('pernyataan_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_pertunjukan');
    }
};
