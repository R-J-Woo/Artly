<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gallery;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $galleries = Gallery::pluck('id');

        foreach (range(1, 10) as $i) {
            User::create([
                'login_id' => $faker->unique()->userName,
                'login_pwd' => bcrypt('password'),
                'user_name' => $faker->name,
                'user_gender' => $faker->randomElement(['M', 'F']),
                'user_age' => $faker->numberBetween(18, 60),
                'user_email' => $faker->unique()->safeEmail,
                'user_phone' => $faker->phoneNumber,
                'user_img' => $faker->imageUrl(),
                'user_keyword' => $faker->word,
                'admin_flag' => 0,
                'gallery_id' => $faker->randomElement($galleries),
                'last_login_time' => now(),
                'reg_time' => now(),
                'update_dttm' => now(),
            ]);
        }
    }
}
