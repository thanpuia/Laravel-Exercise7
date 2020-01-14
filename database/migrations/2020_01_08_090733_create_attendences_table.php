<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendencesTable extends Migration
{
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_registration_number');
            $table->date('date');
            $table->boolean('status');
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('users_registration_number')->references('registration_number')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendences');
    }
}
