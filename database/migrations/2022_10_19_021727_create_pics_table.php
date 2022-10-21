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
        Schema::create('pic', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir')->nullable();
            $table->string('jenkel');
            $table->string('no_hp');
            $table->unsignedBigInteger('bank_id');
            $table->string('alamat_rumah')->nullable();
            $table->string('email_pribadi')->nullable();
            $table->string('email_kantor')->nullable();
            $table->string('jabatan');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('pic');
    }
};
