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
            Reservation::create([
                'user_id' => $faker->randomElement($userIds),
                'session_id' => $faker->randomElement($sessionIds),
                'reservation_datetime' => '2025-05-21 11:00:00',
                'reservation_number_of_tickets' => $faker->numberBetween(1, 10),
                'reservation_total_price' => $faker->numberBetween(5000, 100000),
                'reservation_payment_method' => $faker->randomElement(['카드', '현금', '계좌이체']),
                'reservation_status' => $faker->randomElement(['reserved', 'canceled', 'used']),
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
