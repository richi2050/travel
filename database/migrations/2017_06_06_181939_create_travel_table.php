<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function(Blueprint $table){
            $table->increments('id');
            $table->integer('travel_account');
            $table->integer('project_id');
            $table->integer('sub_project_id');
            $table->integer('user_id');
            $table->float('amount');
            $table->boolean('active')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travels');
    }
}
