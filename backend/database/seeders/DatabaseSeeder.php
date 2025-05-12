<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GallerySeeder::class,
            UserSeeder::class,
            ExhibitionSeeder::class,
            AnnouncementSeeder::class,
            ArtistSeeder::class,
            ArtSeeder::class,
            BookSeeder::class,
            BookPageSeeder::class,
            ExhibitionArtSeeder::class,
            ExhibitionParticipationSeeder::class,
            SessionSeeder::class,
            ReservationSeeder::class,
            UserBookSeeder::class,
        ]);
    }
}
