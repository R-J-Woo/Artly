<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;
use App\Models\Exhibition;
use Faker\Factory as Faker;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $exhibitionIds = Exhibition::pluck('id')->toArray();

        foreach (range(1, 30) as $i) {
            $date = $faker->dateTimeBetween('now', '+1 month');
            $capacity = $faker->numberBetween(30, 100);

            Session::create([
                'exhibition_id' => $faker->randomElement($exhibitionIds),
                'session_datetime' => $date->format('Y-m-d H:i:s'),
                'session_total_capacity' => $capacity,
                'session_reservation_capacity' => $faker->numberBetween(0, $capacity),
                'create_dttm' => now(),
                'update_dttm' => now(),
            ]);
        }
    }
}
