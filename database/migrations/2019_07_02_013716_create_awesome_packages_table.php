<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwesomePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awesome_packages', function (Blueprint $table) {
            $table->increments('awesome_id');
            $table->string('awesome_title');
            $table->text('awesome_details');
            $table->string('awesome_place');
            $table->string('awesome_date');
            $table->string('awesome_photo');
            $table->string('awesome_slug',30);
            $table->integer('awesome_status')->default(1);
            $table->integer('awesome_uploader')->nullable();
            $table->integer('awesome_updator')->nullable();
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
        Schema::dropIfExists('awesome_packages');
    }
}
