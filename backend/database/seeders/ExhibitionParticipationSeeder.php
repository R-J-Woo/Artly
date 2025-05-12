<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exhibition;
use App\Models\Artist;
use App\Models\ExhibitionParticipation;
use Faker\Factory as Faker;

class ExhibitionParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $exhibitionIds = Exhibition::pluck('id')->toArray();
        $artistIds = Artist::pluck('id')->toArray();

        // 각 전시회에 대해 1~3명의 작가 참여
        foreach ($exhibitionIds as $exhibitionId) {
            $selectedArtists = $faker->randomElements($artistIds, rand(1, 3));

            foreach ($selectedArtists as $artistId) {
                ExhibitionParticipation::create([
                    'exhibition_id' => $exhibitionId,
                    'artist_id' => $artistId,
                    'role' => $faker->randomElement(['작가', '게스트', '기획자']),
                    'create_dttm' => now(),
                    'update_dttm' => now(),
                ]);
            }
        }
    }
}
