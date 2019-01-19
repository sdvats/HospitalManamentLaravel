<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItineraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('opdpatient_id');
            $table->dateTime('arrival_date');
            $table->dateTime('departure_date')->nullable();
            $table->string('note')->nullable();
            $table->string('created_by');
            $table->timestamps();

            $table->foreign('opdpatient_id')->references('id')->on('opdpatients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
}
