<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('kvk');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->integer('phone');
            $table->time('is_open')->nullable();             
            $table->time('is_closed')->nullable();            
            $table->string('photo');
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('restaurants');
    }
}
