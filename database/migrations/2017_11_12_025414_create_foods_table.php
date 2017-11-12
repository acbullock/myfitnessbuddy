<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('foods', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->integer('meal_id')->unsigned();
            $table->integer('protein');
            $table->integer('carbs');
            $table->integer('fat'); 
            $table->timestamps();
        });
        Schema::table('foods', function($table) {
            $table->foreign('meal_id')->references('id')->on('meals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foods');
    }
}
