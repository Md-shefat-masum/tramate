<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_name');
            $table->string('member_desig');
            $table->string('member_url1')->nullable();
            $table->string('member_url2')->nullable();
            $table->string('member_url3')->nullable();
            $table->string('member_url4')->nullable();
            $table->string('member_photo');
            $table->string('member_slug',30);
            $table->integer('member_status')->default(1);
            $table->integer('member_uploader')->nullable();
            $table->integer('member_updator')->nullable();
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
        Schema::dropIfExists('members');
    }
}
