<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('city');
            $table->string('country');
            $table->string('email')->unique();
            $table->bigInteger('mobile')->unique();
            $table->string('mode');
            $table->string('procedure');
            $table->string('detail');
            $table->string('phase');
            $table->string('remarks');
            $table->boolean('reminder');
            $table->date('first_reminder')->nullable();
            $table->date('second_reminder')->nullable();
            $table->date('third_reminder')->nullable();
            $table->boolean('booked');
            $table->rememberToken();
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
        Schema::drop('callers');
    }
}
