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
            AnnouncementSeeder::class,
            ArtistSeeder::class,
            ArtSeeder::class,
            BookPageSeeder::class,
            BookSeeder::class,
            ExhibitionArtSeeder::class,
            ExhibitionParticipationSeeder::class,
            ExhibitionSeeder::class,
            GallerySeeder::class,
            ReservationSeeder::class,
            SessionSeeder::class,
            UserBookSeeder::class,
            UserSeeder::class,
        ]);
    }
}
