<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Project;
use App\SubProject;

class SubprojectSeeder extends Seeder
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

        for($i=1;$i <= ENV('NUM_FOR');$i++){

            SubProject::create([
                'name' => 'Nombre del sub proyecto'.$i,
                'description' =>'Descripcion de '.$i,
                'project_id' => $faker->numberBetween(1,$counProject),
                'business_id'   => 1
            ]);
        }
    }
}
