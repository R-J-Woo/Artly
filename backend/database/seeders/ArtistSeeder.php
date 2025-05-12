<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use Faker\Factory as Faker;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            Artist::create([
                'artist_image' => $faker->imageUrl(),
                'artist_name' => $faker->name,
                'artist_category' => 'Painter',
                'artist_nation' => $faker->country,
                'artist_description' => $faker->paragraph,
                'create_dttm' => now(),
                'update_dttm' => now(),
            ]);
        }
    }
}
