<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookPage; 
use App\Models\Book;   
use App\Models\Art;    
use Faker\Factory as Faker;

class BookPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $bookIds = Book::pluck('id')->toArray();
        $artIds = Art::pluck('id')->toArray();

        foreach (range(1, 30) as $i) {  // 책 한 권당 여러 페이지라고 가정해서 30개 생성
            BookPage::create([
                'book_id' => $faker->randomElement($bookIds),
                'art_id' => $faker->randomElement($artIds),
                'book_page_sequence' => $faker->numberBetween(1, 20),
                'book_page_description' => $faker->paragraph,
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
