<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exhibition;
use App\Models\Gallery;
use Faker\Factory as Faker;

class ExhibitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $galleryIds = Gallery::pluck('id');

        foreach (range(1, 10) as $i) {
            Exhibition::create([
                'exhibition_title' => $faker->sentence(3),
                'exhibition_poster' => $faker->imageUrl(640, 480, 'exhibition'),
                'exhibition_category' => $faker->word,
                'exhibition_start_date' => '2025-05-01',
                'exhibition_end_date' => '2025-06-01',
                'exhibition_start_time' => '2025-05-01 10:00:00',
                'exhibition_end_time' => '2025-06-01 17:00:00',
                'exhibition_location' => $faker->address,
                'exhibition_price' => $faker->numberBetween(5000, 50000),
                'gallery_id' => $faker->randomElement($galleryIds),
                'exhibition_tag' => implode(',', $faker->words(3)),
                'exhibition_status' => $faker->randomElement(['scheduled', 'exhibited', 'ended']),
                'create_dttm' => now(),
                'update_dttm' => now(),
            ]);
        }
    }
}
