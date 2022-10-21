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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('client_id');
            $table->string('perihal');
            $table->longText('body');
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('jenis_surat')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('client_id')->references('id')->on('client')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
};
