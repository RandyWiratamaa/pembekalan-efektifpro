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
        Schema::create('pembekalan', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('penyelenggara_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('pic_id');
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('metode_id');
            $table->string('investasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('mulai');
            $table->time('selesai');
            $table->string('link_zoom');
            $table->string('min_peserta');
            $table->unsignedBigInteger('pengajar_id');
            $table->boolean('is_done')->default(false);
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('jenis_pembekalan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('penyelenggara_id')->references('id')->on('penyelenggara')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pic_id')->references('id')->on('pic')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pengajar_id')->references('id')->on('pengajar')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembekalan');
    }
};
