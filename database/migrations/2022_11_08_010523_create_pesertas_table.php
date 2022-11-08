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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('jenkel')->nullable();
            $table->string('nohp')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('email_kantor')->nullable();
            $table->string('email_pribadi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pembekalan_uuid');
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
        Schema::dropIfExists('peserta');
    }
};
