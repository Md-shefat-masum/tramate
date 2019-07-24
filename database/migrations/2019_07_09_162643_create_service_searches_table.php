<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_searches', function (Blueprint $table) {
            $table->increments('service_search_id');
            $table->integer('from_id');
            $table->integer('to_id')->nullable();
            $table->integer('service_type_id');
            $table->integer('service_id');
            $table->string('time')->nullable();
            $table->string('price');
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->integer('service_status')->default(1);
            $table->string('service_slug', 30);
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
        Schema::dropIfExists('service_searches');
    }
}
