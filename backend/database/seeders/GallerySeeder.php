<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Faker\Factory as Faker;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            Gallery::create([
                'gallery_name' => $faker->company . ' 갤러리',
                'gallery_image' => $faker->imageUrl(640, 480, 'gallery'),
                'gallery_address' => $faker->address,
                'gallery_start_time' => '2025-05-01 09:00:00',
                'gallery_end_time' => '2025-06-01 18:00:00',
                'gallery_closed_day' => '2025-05-11 18:00:00',
                'gallery_category' => $faker->word,
                'gallery_description' => $faker->paragraph,
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
