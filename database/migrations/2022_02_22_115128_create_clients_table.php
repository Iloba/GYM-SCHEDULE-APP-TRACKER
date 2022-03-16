<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('age');
            $table->string('gender');
            $table->string('sex');
            $table->string('password');
            $table->string('weight');
            $table->string('height');
            $table->string('weight_goal');
            $table->string('workout_time');
            $table->string('workout_time_per_week');
            $table->string('workout_place');
            $table->string('diet_type');
            $table->string('role');
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
        Schema::dropIfExists('clients');
    }
}
