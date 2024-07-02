<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // creiamo un array di servizi aggiuntivi
        $service_name = ['WI-FI','PARCHEGGIO','PISCINA','SPA','VISTA MARE','VISTA LAGO','VISTA FIUME','ESSENZIALI','TV',
        'BALCONE','ANIMALI','RECEPTION','AMMOBILIATO','NON AMMOBILIATO','ASCENSORE','CLIMATIZZATORE'];
        
        // cicliamo i vari servizi
        for($i = 0; $i < 16; $i++ ){
            $new_service = new Service();

            // popolo la colonna dei nomi dei servizi con nomi presi dall'array creato prima 
            $new_service->name = $service_name[$i];
            // salvo i servizi
            $new_service->save();
        }
    }
}
