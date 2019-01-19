<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldpatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oldpatients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ipd_no');
            $table->date('date');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->unsignedBigInteger('contact_1');
            $table->unsignedBigInteger('contact_2')->nullable();
            $table->unsignedInteger('country');
            $table->string('state')->nullable();
            $table->string('remarks');
            $table->timestamps();

            $table->foreign('country')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oldpatients');
    }
}
