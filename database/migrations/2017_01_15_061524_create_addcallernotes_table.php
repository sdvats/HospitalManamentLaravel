<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddcallernotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callernotes', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('caller_id');
            $table->string('caller_note');
            $table->timestamps();

            $table->foreign('caller_id')->references('id')->on('callers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('callernotes');
    }
}
