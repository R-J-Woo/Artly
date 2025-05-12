<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Art;
use App\Models\Artist;
use Faker\Factory as Faker;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $artistIds = Artist::pluck('id')->toArray();

        foreach (range(1, 20) as $i) {
            Art::create([
                'art_image' => $faker->imageUrl(800, 600, 'art'),
                'artist_id' => $faker->randomElement($artistIds),
                'art_title' => $faker->sentence(2),
                'art_description' => $faker->paragraph,
                'art_docent' => $faker->url . '//docents//' . $faker->uuid . '.mp3',
                'create_dttm' => now(),
                'update_dttm' => now(),
            ]);
        }
    }
}
