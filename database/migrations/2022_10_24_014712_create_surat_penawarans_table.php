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
            $table->unsignedBigInteger('pembekalan_id');
            $table->string('perihal');
            $table->longText('body');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pembekalan_id')->references('id')->on('pembekalan')->onUpdate('cascade')->onDelete('restrict');
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
