<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClientSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Client::factory(10)->create();
        $this->call([
            ClientSeeder::class,
            AdminSeeder::class
        ]);
    }
}
