<?php

use Illuminate\Database\Seeder;
use App\Project;

use Faker\Factory as Faker;
use App\User;

class ProjectTableSeeder extends Seeder
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

        for($i=1;$i <= ENV('NUM_FOR');$i++){

            Project::create([
                'name' => 'Nombre del proyecto'.$i,
                'description' =>'Descripción proyecto '.$i,
                'user_id' => $faker->numberBetween(1,$countUser)
            ]);
        }
    }
}
