<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('opdpatient_id');
            $table->integer('amount');
            $table->string('currency');
            $table->string('payment_note')->nullable();
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
        Schema::dropIfExists('estimates');
    }
}
