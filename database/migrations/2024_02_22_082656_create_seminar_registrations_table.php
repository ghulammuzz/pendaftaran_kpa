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
        Schema::create('seminar_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('alamat');
            $table->string('nama_instansi');
            $table->string('no_hp');
            $table->enum('status', ['Participant', 'Presenter']);
            $table->string('judul')->nullable();
            $table->text('abstrak')->nullable();
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('seminar_registrations');
    }
};
