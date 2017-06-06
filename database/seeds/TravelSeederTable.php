<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\SubProject;
use App\User;
use App\Travel;
use Faker\Factory as Faker;

class TravelSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $countUser = count( User::all());
        $counProject = count(Project::all());
        $counSubProject = count(SubProject::all());
        for($i=1;$i <= ENV('NUM_FOR');$i++){
            Travel::create([
                'travel_account' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'project_id'     => $faker->numberBetween(1,$counProject),
                'sub_project_id' => $faker->numberBetween(1,$counSubProject),
                'user_id'        => $faker->numberBetween(1,$countUser),
                'amount'         => $faker->randomFloat(3, 0, 1000)
            ]);
        }
    }
}
