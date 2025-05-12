<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = \App\Models\User::pluck('id')->toArray();
        $sessionIds = \App\Models\Session::pluck('id')->toArray();

        foreach (range(1, 10) as $i) {
            Gallery::create([
                'user_id' => $faker->randomElement($userIds),
                'session_id' => $faker->randomElement($sessionIds),
                'reservation_status' => 'CONFIRMED',
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
