<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use App\Models\User;
use Faker\Factory as Faker;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 10) as $i) {
            Announcement::create([
                'announcement_title' => $faker->sentence,
                'user_id' => $faker->randomElement($userIds),
                'announcement_poster' => $faker->imageUrl(640, 480, 'announcement'),
                'announcement_start_datetime' => $faker->dateTimeBetween('-2 months', 'now'),
                'announcement_end_datetime' => $faker->dateTimeBetween('now', '+2 months'),
                'announcement_organizer' => $faker->company,
                'announcement_contact' => $faker->phoneNumber,
                'announcement_support_detail' => $faker->sentence,
                'announcement_site_url' => $faker->url,
                'announcement_attachment_url' => $faker->url,
                'content' => $faker->paragraph,
                'announcement_create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
