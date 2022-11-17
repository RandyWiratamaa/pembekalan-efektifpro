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
        Schema::create('surat_penegasan', function (Blueprint $table) {
            $table->id();
            $table->string('pembekalan_uuid');
            $table->string('no_surat_penawaran');
            $table->string('no_surat')->unique();
            $table->date('tgl_surat');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('pic_id');;
            $table->string('perihal');
            $table->longText('body');
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pic_id')->references('id')->on('pic')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('surat_penegasan');
    }
};
