<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->increments('counter_id');
            $table->integer('counter_tourist')->default(0);
            $table->integer('counter_tour')->default(0);
            $table->integer('counter_guide')->default(0);
            $table->integer('counter_supported')->default(0);
            $table->string('counter_slug',30);
            $table->integer('counter_status')->default(1);
            $table->integer('counter_updator')->nullable();
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
        Schema::dropIfExists('counters');
    }
}
