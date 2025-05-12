<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Exhibition;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $exhibitionIds = Exhibition::pluck('id')->toArray();

        foreach (range(1, 10) as $i) {
            Book::create([
                'book_title' => $faker->sentence(3),
                'book_poster' => $faker->imageUrl(640, 480, 'book'),
                'exhibition_id' => $faker->randomElement($exhibitionIds),
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
