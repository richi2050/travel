<?php

use Illuminate\Database\Seeder;
use App\Travel;
use App\Project;
use App\SubProject;
use Faker\Factory as Faker;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        $counProject = count(Project::all());
        $counSubProject = count(SubProject::all());
        for($i=1;$i <= ENV('NUM_FOR',20);$i++){
            Travel::create([
                'name'              =>  'Viaje '.$faker->randomNumber($nbDigits = NULL, $strict = false),
                'description'       =>  'Descripcion de '.$i,
                'project_id'        =>  $faker->numberBetween(1,$counProject),
                'sub_project_id'    =>  $faker->numberBetween(1,$counSubProject),
                'business_id'       =>  1,
                'short_name'        =>  'DF123_TR',
                'user_id'           =>  "af342f96-9425-44c2-bdde-78b9d00b131e"
            ]);
        }
    }
}
