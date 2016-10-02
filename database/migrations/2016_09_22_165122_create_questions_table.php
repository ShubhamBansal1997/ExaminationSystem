<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('ques_id');
            $table->integer('o_id')->nullable();
            $table->integer('sub_id');
            $table->integer('chap_id');
            $table->longtext('ques_exp');
            $table->longtext('ques_ans1');
            $table->longtext('ques_ans2');
            $table->longtext('ques_ans3');
            $table->longtext('ques_ans4');
            $table->integer('ques_ans')->length(1);
            $table->longtext('ques_sol');
            $table->integer('ques_level')->length(1);
            $table->integer('ques_imp')->length(1);            
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
        Schema::dropIfExists('questions');
    }
}
