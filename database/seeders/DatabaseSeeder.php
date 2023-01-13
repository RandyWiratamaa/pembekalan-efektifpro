<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // factory(\App\Models\User::class,10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call ([
        UserSeeder::class,
        JenisBankSeeder::class,
        JenisPembekalanSeeder::class,
        MetodePembekalanSeeder::class,
        PenyelenggaraSeeder::class,
        ]);
    }
}
