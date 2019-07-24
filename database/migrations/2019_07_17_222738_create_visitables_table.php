<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitables', function (Blueprint $table) {
            $table->increments('visitable_id');
            $table->string('visitable_name');
            $table->text('visitable_details');
            $table->string('visitable_address');
            $table->string('visitable_photo');
            $table->integer('from_id');
            $table->integer('visitable_status')->default(1);
            $table->string('visitable_slug', 30);
            $table->integer('visitable_uploader')->nullable();
            $table->integer('visitable_updator')->nullable();
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
        Schema::dropIfExists('visitables');
    }
}
