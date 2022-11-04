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
        Schema::table('pembekalan', function (Blueprint $table) {
            $table->unsignedBigInteger('pic_id')->after('bank_id');
            $table->unsignedBigInteger('pengajar_id')->after('investasi');

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
        Schema::table('pembekalan', function (Blueprint $table) {
            //
        });
    }
};
