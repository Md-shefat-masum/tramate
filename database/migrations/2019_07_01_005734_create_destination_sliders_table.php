<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_sliders', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('slider_title');
            $table->text('slider_details');
            $table->string('slider_price');
            $table->string('slider_rate')->nullable();
            $table->string('slider_quality')->nullable();
            $table->string('slider_visit')->nullable();
            $table->string('slider_photo');
            $table->integer('slider_category');
            $table->string('slider_slug',30);
            $table->integer('slider_status')->default(1);
            $table->integer('slider_uploader')->nullable();
            $table->integer('slider_updator')->nullable();
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
        Schema::dropIfExists('destination_sliders');
    }
}
