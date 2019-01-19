<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('procedure_name');
        });

        Schema::create('oldpatient_procedure', function(Blueprint $table)
        {
            $table->integer('oldpatient_id')->unsigned()->index();
            $table->foreign('oldpatient_id')->references('id')->on('oldpatients')->onDelete('cascade');
            $table->integer('procedure_id')->unsigned()->index();
            $table->foreign('procedure_id')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oldpatient_procedure');
        Schema::dropIfExists('procedures');

    }
}
