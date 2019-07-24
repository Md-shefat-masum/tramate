<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->string('blog_title');
            $table->text('blog_details');
            $table->integer('blog_role_id');
            $table->integer('blog_cate_id');
            $table->string('blog_photo');
            $table->string('blog_slug',30);
            $table->integer('blog_status')->default(1);
            $table->integer('blog_uploader')->nullable();
            $table->integer('blog_updator')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
