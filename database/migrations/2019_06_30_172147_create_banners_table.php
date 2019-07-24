<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('ban_id');
            $table->string('ban_subtitle');
            $table->string('ban_title');
            $table->text('ban_details');
            $table->string('ban_btn1');
            $table->text('ban_url1');
            $table->string('ban_btn2');
            $table->text('ban_url2');
            $table->string('ban_photo');
            $table->string('ban_slug',30);
            $table->integer('ban_status')->default(1);
            $table->integer('ban_uploader')->nullable();
            $table->integer('ban_updator')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
