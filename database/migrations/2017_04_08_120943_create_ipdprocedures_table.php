<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpdproceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ipdprocedures', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('ipdprocedure_name');
        });

            Schema::create('ipdpatient_ipdprocedure', function(Blueprint $table)
            {
                $table->integer('ipdpatient_id')->unsigned()->index();
                $table->foreign('ipdpatient_id')->references('id')->on('ipdpatients')->onDelete('cascade');
                $table->integer('ipdprocedure_id')->unsigned()->index();
                $table->foreign('ipdprocedure_id')->references('id')->on('ipdprocedures');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipdpatient_ipdprocedure');
        Schema::dropIfExists('ipdprocedures');
    }
}
