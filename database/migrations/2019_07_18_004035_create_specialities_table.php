<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->increments('speciality_id');
            $table->string('speciality_name');
            $table->text('speciality_details');
            $table->string('speciality_photo');
            $table->integer('from_id');
            $table->integer('speciality_status')->default(1);
            $table->string('speciality_slug', 30);
            $table->integer('speciality_uploader')->nullable();
            $table->integer('speciality_updator')->nullable();
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
        Schema::dropIfExists('specialities');
    }
}
