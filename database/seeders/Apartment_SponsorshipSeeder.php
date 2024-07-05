<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class Apartment_SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $sponsorships = Sponsorship::all();

        $ids_sposnorship = $sponsorships->pluck('id')->all();

        $apartments = Apartment::all();
        
        foreach($apartments as $apartment ){

            $random_sposnorships = $faker->randomElements($ids_sposnorship);
            // @dd($random_services);

            foreach($random_sposnorships as $sponsorship){
                $apartment->sponsorships()->attach($sponsorship);
                $apartment->save();
                
            }
        }
    }
}
