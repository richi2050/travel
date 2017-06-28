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
        for($i=1;$i <= ENV('NUM_FOR');$i++){
            Travel::create([
                'name' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'description' =>'Descripcion de '.$i,
                'project_id'     => $faker->numberBetween(1,$counProject),
                'sub_project_id' => $faker->numberBetween(1,$counSubProject),
                'amount'         => $faker->randomFloat(3, 0, 1000)
            ]);
        }
    }
}
