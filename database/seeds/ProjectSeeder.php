<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1;$i <= ENV('NUM_FOR');$i++){

            Project::create([
                'name' => 'Nombre del proyecto'.$i,
                'description' =>'Descripción proyecto '.$i,
            ]);
        }
    }
}
