<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lecturer_number');
            $table->foreign('lecturer_number')->references('lect_number')->on('lectures');
            $table->string('unit_cod');
            $table->foreign('unit_cod')->references('unit_code')->on('units');
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
        Schema::dropIfExists('lecture_units');
    }
}
