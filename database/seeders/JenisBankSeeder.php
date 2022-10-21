<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_bank')->insert([
        	'jenis'=> 'Konvensional'
        ]);
        DB::table('jenis_bank')->insert([
        	'jenis'=> 'Syariah'
        ]);
    }
}
