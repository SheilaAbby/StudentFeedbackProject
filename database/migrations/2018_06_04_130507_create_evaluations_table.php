<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('u_code');
            //$table->foreign('u_code')->references('unit_code')->on('units');
            $table->string('lect_id');
            $table->decimal('presentation');
            $table->decimal('subject_matter');
            $table->decimal('personal_attributes');

           // $table->foreign('lecture_number')->references('lect_number')->on('lectures');
            $table->decimal('score');
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
        Schema::dropIfExists('evaluations');
    }
}
