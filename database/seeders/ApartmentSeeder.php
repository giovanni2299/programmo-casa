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

         // creo un array con delle vie di milano
         $apartment_streets = ['Via Vitorio Pisani 20124 Milano MI', 
         'Via Giulio Cesare Procaccini 20154 Milano MI', 
         'Via Giotto 20145 Milano MI', 
         'Via Andrea Salaino 20144 Milano MI', 
         'Via Carlo Botta 20135 Milano MI', 
         'Via Pasquale Sottocorno 20129 Milano MI',  
         'Via Lambro 20129 Milano MI', 
         'Corso Di Porta Ticinese 20123 Milano MI', 
         'Via Lodovico Settala 20124 Milano MI', 
         'Via Ciovassino 20121 Milano MI' 
         ];

         //  creo la latitudine degli appartamenti
         $apartment_latitude = ['45.481487',
        '45.482516',
        '45.469681', 
        '45.456429', 
        '45.455147', 
        '45.465698', 
        '45.473969', 
        '45.455218', 
        '45.478900', 
        '45.469521'];

         //  creo la longitudine degli appartamenti
         $apartment_longitude = ['9.199866', 
         '9.168860', 
         '9.156283', 
         '9.164435', 
         '9.205952', 
         '9.209378', 
         '9.208528', 
         '9.180599', 
         '9.204642', 
         '9.187291'];

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
            $new_apartment->rooms = $faker->numberBetween(2,8);
            
            // facciamo dei controlli in base al numero di stanze per generare bagni e letti
            if($new_apartment->rooms === 2){
                $new_apartment->bathrooms = 1 ;
                $new_apartment->beds = 1;
                $new_apartment->sqr_meters = $faker->numberBetween(15,40);

            }elseif($new_apartment->rooms === 3) {
                $new_apartment->bathrooms = 1;
                $new_apartment->beds = 1;
                $new_apartment->sqr_meters = $faker->numberBetween(40,75);

            }elseif($new_apartment->rooms === 4) {
                $new_apartment->bathrooms = 1;
                $new_apartment->beds = $faker->numberBetween(2,3);
                $new_apartment->sqr_meters = $faker->numberBetween(75,95);

            }elseif($new_apartment->rooms === 5) {
                $new_apartment->bathrooms = $faker->numberBetween(1,2);
                $new_apartment->beds = $faker->numberBetween(2,3);
                $new_apartment->sqr_meters = $faker->numberBetween(95,115);

            }elseif($new_apartment->rooms === 6) {
                $new_apartment->bathrooms = 2;
                $new_apartment->beds = 3;
                $new_apartment->sqr_meters = $faker->numberBetween(115,135);

            }elseif($new_apartment->rooms === 7) {
                $new_apartment->bathrooms = 2;
                $new_apartment->beds = 3;
                $new_apartment->sqr_meters = $faker->numberBetween(135,160);

            }else{
                $new_apartment->bathrooms = 2;
                $new_apartment->beds = $faker->numberBetween(3,4);
                $new_apartment->sqr_meters = $faker->numberBetween(160,200);

            };

            if($new_apartment->bathrooms + $new_apartment->beds === $new_apartment->rooms){
                $new_apartment->rooms++;

            }
            
            //popoliamo la colonna delle immagini prendendone una random dall'array creato prima
            $new_apartment->img_apartment = $faker->randomElement($img_apartment);
            // popoliamo la colonna della descrizione 
            $new_apartment->description = $faker->paragraph();
            // popoliamo la colonna dell'indirizzo con vie random prese da un array
            $new_apartment->complete_address = $faker->randomElement($apartment_streets);
            // popoliamo la colonna della latitudine con dati random
            $new_apartment->latitude = $faker->randomNumber(7);

            if($new_apartment->complete_address == 'Via Vitorio Pisani 20124 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[0];

            } elseif ($new_apartment->complete_address == 'Via Giulio Cesare Procaccini 20154 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[1];

            } elseif ($new_apartment->complete_address == 'Via Giotto 20145 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[2];

            } elseif ($new_apartment->complete_address == 'Via Andrea Salaino 20144 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[3];

            } elseif ($new_apartment->complete_address == 'Via Carlo Botta 20135 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[4];

            } elseif ($new_apartment->complete_address == 'Via Pasquale Sottocorno 20129 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[5];

            } elseif ($new_apartment->complete_address == 'Via Lambro 20129 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[6];

            } elseif ($new_apartment->complete_address == 'Corso Di Porta Ticinese 20123 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[7];

            } elseif ($new_apartment->complete_address == 'Via Lodovico Settala 20124 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[8];

            } elseif ($new_apartment->complete_address == 'Via Ciovassino 20121 Milano MI'){

                $new_apartment->latitude = $apartment_latitude[9];

            };

            // popoliamo la colonna della longitudine con dati random
            $new_apartment->longitude = $faker->randomNumber(7);

            if($new_apartment->complete_address == 'Via Vitorio Pisani 20124 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[0];

            } elseif ($new_apartment->complete_address == 'Via Giulio Cesare Procaccini 20154 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[1];

            } elseif ($new_apartment->complete_address == 'Via Giotto 20145 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[2];

            } elseif ($new_apartment->complete_address == 'Via Andrea Salaino 20144 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[3];

            } elseif ($new_apartment->complete_address == 'Via Carlo Botta 20135 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[4];

            } elseif ($new_apartment->complete_address == 'Via Pasquale Sottocorno 20129 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[5];

            } elseif ($new_apartment->complete_address == 'Via Lambro 20129 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[6];

            } elseif ($new_apartment->complete_address == 'Corso Di Porta Ticinese 20123 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[7];

            } elseif ($new_apartment->complete_address == 'Via Lodovico Settala 20124 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[8];

            } elseif ($new_apartment->complete_address == 'Via Ciovassino 20121 Milano MI'){

                $new_apartment->longitude = $apartment_longitude[9];

            };
            
            // diciamo se l'appartamento è visibile o meno con un generatore booleano random 
            $new_apartment->visible = $faker->boolean();
            // salviamo i dati
            $new_apartment->save();

            // $random_user_ids = $faker->randomElements($user_ids, null); // [3,6,9]
            // $new_apartment->user()->attach($random_user_ids);











        }

    }
}
