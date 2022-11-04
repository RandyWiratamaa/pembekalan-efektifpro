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
        Schema::table('surat_penegasan', function (Blueprint $table) {
            $table->string('pembekalan_uuid')->after('id');
            $table->boolean('status')->default(false);
            $table->dropForeign(['pembekalan_id']);
            $table->dropColumn('pembekalan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_penegasan', function (Blueprint $table) {
            //
        });
    }
};
