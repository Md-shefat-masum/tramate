<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('hotel_id');
            $table->integer('hotel_name');
            $table->text('hotel_details');
            $table->string('hotel_star');
            $table->string('hotel_food_status');
            $table->string('hotel_price');
            $table->string('hotel_contact');
            $table->string('hotel_address');
            $table->integer('from_id');
            $table->integer('hotel_status')->default(1);
            $table->string('hotel_slug', 30);
            $table->integer('hotel_uploader')->nullable();
            $table->integer('hotel_updator')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
