<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_number');
            $table->string('team_name');
            $table->string('leader_name');
            $table->string('leader_email');
            $table->string('leader_phone');
            $table->tinyinteger('member_count');
            $table->string('name_member');
            $table->string('phone_member');
            $table->string('category');
            $table->tinyinteger('occupation');
            $table->string('university');
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
        Schema::dropIfExists('teams');
    }
}
