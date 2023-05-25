<?php

namespace Database\Seeders;

use App\Models\Train;
use DateInterval;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $companies = ['Trenitalia', 'Italo', 'Thello', 'SNCF'];
        $citiesOrigin = ['Torino', 'Milano', 'Parigi'];
        $citiesDestiny = ['Venezia', 'Genova', 'Reggo C.', 'Sulmona', 'Bologna', 'Roma', 'Centocelle'];

        for ($i=0; $i < 20; $i++) {
            $fakeTime = $faker->time();

            $time = DateTime::createFromFormat('H:i:s', $fakeTime);


            $time->add(new DateInterval('PT'.rand(1,6).'H'));

            $destiny_time = $time->format('H:i:s');

            $newTrain = new Train();

            $newTrain->company = $companies[rand(0, 3)];
            $newTrain->origin = $citiesOrigin[rand(0, 2)];
            $newTrain->destiny = $citiesDestiny[rand(0, 6)];
            $newTrain->date = $faker->dateTimeBetween('0 week', '1 week');
            $newTrain->origin_time = $fakeTime;
            $newTrain->destiny_time =  $destiny_time;
            $newTrain->code = $faker->numberBetween(4320,8825);
            $newTrain->coaches = $faker->numberBetween(3, 11);
            $newTrain->ontime = $faker->numberBetween(0, 1);
            $newTrain->canceled = $faker->numberBetween(0, 1);

            $newTrain->save();
        }
    }
}
