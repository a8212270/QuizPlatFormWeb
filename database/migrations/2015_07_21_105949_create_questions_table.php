<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stages_id')->unsigned();
            $table->string('qtitle');
            $table->string('ans1_title');
            $table->string('ans2_title');
            $table->string('ans3_title');
            $table->string('ans4_title');
            $table->string('ans5_title');
            $table->string('ans6_title');
            $table->integer('answer')->unsigned();
            $table->string('detailed');
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
        Schema::drop('questions');
    }
}
