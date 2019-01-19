<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdprocedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opdprocedures', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('opdprocedure_name');
        });

            Schema::create('opdpatient_opdprocedure', function(Blueprint $table)
            {
                $table->integer('opdpatient_id')->unsigned()->index();
                $table->foreign('opdpatient_id')->references('id')->on('opdpatients')->onDelete('cascade');
                $table->integer('opdprocedure_id')->unsigned()->index();
                $table->foreign('opdprocedure_id')->references('id')->on('opdprocedures');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opdpatient_opdprocedure');
        Schema::dropIfExists('opdprocedures');
    }
}
