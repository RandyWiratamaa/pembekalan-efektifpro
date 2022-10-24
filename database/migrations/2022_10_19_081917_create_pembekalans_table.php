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
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('level_id');
            $table->string('investasi');
            $table->date('hari_tanggal');
            $table->time('mulai');
            $table->time('selesai');
            $table->unsignedBigInteger('metode_id');
            $table->string('min_peserta');
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('restrict');
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
