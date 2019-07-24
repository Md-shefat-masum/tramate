<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFromsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('froms', function (Blueprint $table) {
            $table->increments('from_id');
            $table->string('from_name');
            $table->string('from_slug', 30);
            $table->integer('from_status')->default(1);
            $table->integer('from_uploader')->nullable();
            $table->integer('from_updator')->nullable();
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
        Schema::dropIfExists('froms');
    }
}
