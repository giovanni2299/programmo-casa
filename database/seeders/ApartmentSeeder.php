<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apartment;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $user_ids = User::all()->pluck('id')->all();

        //creo un array con i nomi degli apartamenti
        $title_apartment=['Appartamanto con piscina',
        'Appartamento vista mare',
        'Appartamento gallegiante',
        'Appartamento in montagna',
        'Appartamento moderno',
        'Appartamento in centro',
        'Appartamento openspace',
        'Appartamento colorato',
        'Appartamento vintage',
        'Appartamento sforzesco'];

        // creo un array con i link delle immagini degli appartamenti
        $img_apartment=['img_apartment/stile-industrial_720.jpg',
        'img_apartment/Affittare-Casa-Vacanza_720.jpg',
        'img_apartment/casa_2_720.jpg',
        'img_apartment/a1_preview_720.jpg',
        'img_apartment/la-casa-stile-bridgerton_-lo-stile-800-e-il-cottagecore_720.jpg',
        'img_apartment/stile_industrial_2_480.jpg',
        'img_apartment/case-galleggianti_ng1_720.jpg',
        'img_apartment/casa_montagna_720.jpg',
        'img_apartment/casa_montagna_2_480.jpg',
        'img_apartment/casa_al_mare_720.jpg'];

        // creo un ciclo for per generare i vari appartamenti
        for($i = 0; $i < 10; $i++){
            //creiamo l'instanza del model apartment
            $new_apartment = new Apartment();

            $new_apartment->user_id = $faker->randomElement($user_ids);


            //popoliamo la colonna dei titoli prendendone uno random dall'array creato
            $new_apartment->title_apartment = $faker->randomElement($title_apartment);
            // popoliamo la colonna delle stanze con un numero random
            $new_apartment->rooms = $faker->numberBetween(3,8);
            
            // facciamo dei controlli in base al numero di stanze per generare bagni e letti
            if($new_apartment->rooms <= 4){
                $new_apartment->bathrooms = 1 ;
                $new_apartment->beds = $faker->numberBetween(1,2);
                $new_apartment->sqr_meters = $faker->numberBetween(70,100);

            }else{
                $new_apartment->bathrooms = 2 ;
                $new_apartment->beds = $faker->numberBetween(2,3);
                $new_apartment->sqr_meters = $faker->numberBetween(120,170);

            };

            if($new_apartment->bathrooms + $new_apartment->beds === $new_apartment->rooms){
                $new_apartment->rooms++;

            }
            
            //popoliamo la colonna delle immagini prendendone una random dall'array creato prima
            $new_apartment->img_apartment = $faker->randomElement($img_apartment);
            // popoliamo la colonna della descrizione 
            $new_apartment->description = $faker->paragraph();
            // popoliamo la colonna della latitudine con dati random
            $new_apartment->latitude = $faker->randomNumber(7);
            // popoliamo la colonna della longitudine con dati random
            $new_apartment->longitude = $faker->randomNumber(7);
            // popoliamo la colonna dell'indirizzo con vie random italiane
            $new_apartment->complete_address = $faker->address();
            // diciamo se l'appartamento è visibile o meno con un generatore booleano random 
            $new_apartment->visible = $faker->boolean();
            // salviamo i dati
            $new_apartment->save();

            // $random_user_ids = $faker->randomElements($user_ids, null); // [3,6,9]
            // $new_apartment->user()->attach($random_user_ids);











        }

    }
}
