<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('tour_id');
            $table->string('tour_name');
            $table->integer('tour_price');
            $table->integer('tour_oldprice')->default(0);
            $table->string('tour_btn');
            $table->string('tour_url');
            $table->string('tour_photo');
            $table->string('tour_slug',30);
            $table->integer('tour_status')->default(1);
            $table->integer('tour_uploader')->nullable();
            $table->integer('tour_updator')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
