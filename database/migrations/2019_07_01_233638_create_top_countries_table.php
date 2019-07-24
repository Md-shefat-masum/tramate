<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_countries', function (Blueprint $table) {
            $table->increments('country_id');
            $table->string('country_name');
            $table->integer('country_reviews')->default(0);
            $table->integer('country_rating')->default(0);
            $table->string('country_photo');
            $table->integer('country_status')->default(1);
            $table->string('country_slug',30);
            $table->integer('country_uploader')->nullable();
            $table->integer('country_updator')->nullable();
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
        Schema::dropIfExists('top_countries');
    }
}
