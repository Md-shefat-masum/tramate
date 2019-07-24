<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('testi_id');
            $table->string('testi_name');
            $table->text('testi_descrip');
            $table->string('testi_desig')->nullable();
            $table->string('testi_photo');
            $table->string('testi_slug',30);
            $table->integer('testi_status')->default(1);
            $table->integer('testi_uploader')->nullable();
            $table->integer('testi_updator')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
}
