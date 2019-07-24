<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->increments('resturant_id');
            $table->string('resturant_name');
            $table->text('resturant_details');
            $table->string('resturant_address');
            $table->string('resturant_lowest_rate');
            $table->string('resturant_highest_rate');
            $table->string('resturant_photo');
            $table->integer('cate_id');
            $table->integer('from_id');
            $table->integer('resturant_status')->default(1);
            $table->string('resturant_slug', 30);
            $table->integer('resturant_uploader')->nullable();
            $table->integer('resturant_updator')->nullable();
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
        Schema::dropIfExists('resturants');
    }
}
