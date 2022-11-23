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
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('pembekalan_uuid');
            $table->longText('body');
            $table->string('absensi');
            $table->string('dokumentasi');
            $table->boolean('is_approved')->default(false);
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('berita_acara');
    }
};
