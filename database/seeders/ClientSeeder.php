<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert 100 records into the db
        for($i=0; $i<20; $i++){
            $clients[] = [
                'user_id' => 1,
                'name' => Str::random(10),
                'phone' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'age' => Str::random(2),
                'gender' => Str::random(5),
                'weight' => Str::random(3),
                'height' => Str::random(3),
                'weight_goal' => Str::random(3),
                'workout_time' => Str::random(5),
                'workout_time_per_week' => Str::random(5),
                'workout_place' => Str::random(3),
                'diet_type' => Str::random(3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
