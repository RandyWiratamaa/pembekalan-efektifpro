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
        Schema::create('pembekalan_pic', function (Blueprint $table) {
            $table->unsignedBigInteger('pembekalan_id');
            $table->unsignedBigInteger('pic_id');
            $table->timestamps();

            $table->foreign('pembekalan_id')->references('id')->on('pembekalan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pic_id')->references('id')->on('pic')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembekalan_pic');
    }
};
