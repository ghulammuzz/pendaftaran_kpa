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
        Schema::create('pendaftaran_kemah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('email');
            $table->string('no_hp');
            $table->string('bidang');
            $table->boolean('pernyataan');
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
        Schema::dropIfExists('pendaftaran_kemah');
    }
};
