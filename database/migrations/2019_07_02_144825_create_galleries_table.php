<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('gallery_id');
            $table->integer('gallery_views')->default(0);
            $table->integer('gallery_comments')->default(0);
            $table->string('gallery_photo');
            $table->string('gallery_slug', 30);
            $table->integer('gallery_status')->default(1);
            $table->integer('gallery_uploader')->nullable();
            $table->integer('gallery_updator')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
