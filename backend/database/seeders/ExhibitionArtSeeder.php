<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExhibitionArt; 
use App\Models\Exhibition;
use App\Models\Art;
use Faker\Factory as Faker;

class ExhibitionArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $exhibitionIds = Exhibition::pluck('id')->toArray();
        $artIds = Art::pluck('id')->toArray();

        foreach (range(1, 30) as $i) {
            ExhibitionArt::create([
                'exhibition_id' => $faker->randomElement($exhibitionIds),
                'art_id' => $faker->randomElement($artIds),
                'display_order' => $faker->numberBetween(1, 5),
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
