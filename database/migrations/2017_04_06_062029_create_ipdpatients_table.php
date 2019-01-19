<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpdpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipdpatients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('opdpatient_id');
            $table->string('ipd_no');
            $table->string('attendent_name')->nullable();
            $table->string('procedure_type');
            $table->string('anesthesia');
            $table->DateTime('admision_date')->nullable();
            $table->Date('procedure_date');
            $table->DateTime('discharge_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('ipdpatients');
    }
}
