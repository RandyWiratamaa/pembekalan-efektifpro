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
        Schema::create('surat_penawaran', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->date('tgl_surat');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('pic_id');
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('metode_id');
            $table->string('perihal');
            $table->longText('body');
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pic_id')->references('id')->on('pic')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('materi_id')->references('id')->on('materi_pembekalan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('metode_id')->references('id')->on('metode_pembekalan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('approved_by')->references('id')->on('bpo')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_penawaran');
    }
};
