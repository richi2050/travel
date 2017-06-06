<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\SubProject;
use App\User;
use Faker\Factory as Faker;

class SubprojectTableSeeder extends Seeder
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

        for($i=1;$i <= ENV('NUM_FOR');$i++){

            SubProject::create([
                'name' => 'Nombre del sub proyecto'.$i,
                'user_id' => $faker->numberBetween(1,$countUser),
                'description' =>'Descripcion de '.$i,
                'project_id' => $faker->numberBetween(1,$counProject)
            ]);
        }

    }
}
