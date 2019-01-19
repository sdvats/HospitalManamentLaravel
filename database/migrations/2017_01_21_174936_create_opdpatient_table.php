<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdpatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opdpatients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender');
            $table->Date('birth_date')->nullable();
            $table->string('group');
            $table->string('address');
            $table->string('country');
            $table->string('email')->nullable();
            $table->bigInteger('contact')->nullable();
            $table->string('mode');
            $table->DateTime('surgery_scheduled')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('opdpatients');
    }
}
