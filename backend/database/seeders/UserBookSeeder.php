<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserBook;
use App\Models\User;    
use App\Models\Book;   
use Faker\Factory as Faker;

class UserBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $bookIds = Book::pluck('id')->toArray();

        foreach (range(1, 20) as $i) {
            UserBook::create([
                'user_id' => $faker->randomElement($userIds),
                'book_id' => $faker->randomElement($bookIds),
                'user_book_payment_method' => $faker->randomElement(['카드', '현금', '계좌이체']),
                'user_book_status' => $faker->randomElement(['paid', 'canceled']),
                'create_dttm' => now(),
                'update_dttm' => now()
            ]);
        }
    }
}
