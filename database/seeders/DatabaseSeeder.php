<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Mail\Events\MessageSent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            SponsorshipSeeder::class,
            ServiceSeeder::class,
            Apartment_ServiceSeeder::class,
            ViewSeeder::class,
            MessageSeeder::class,

        ]);
    }
}
