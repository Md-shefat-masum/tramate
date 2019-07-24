<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChooseUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chooseuses', function (Blueprint $table) {
            $table->increments('choose_id');
            $table->string('choose_title');
            $table->text('choose_details');
            $table->string('choose_li1');
            $table->string('choose_li2');
            $table->string('choose_li3');
            $table->string('choose_li4');
            $table->string('choose_btn1');
            $table->text('choose_url1')->nullable();
            $table->string('choose_btn2');
            $table->text('choose_url2')->nullable();
            $table->string('choose_photo');
            $table->integer('choose_status')->default(1);
            $table->string('choose_slug',30);
            $table->integer('choose_uploader')->nullable();
            $table->integer('choose_updator')->nullable();
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
        Schema::dropIfExists('choose_uses');
    }
}
