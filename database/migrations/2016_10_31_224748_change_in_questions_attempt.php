<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInQuestionsAttempt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_attempt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ques_id');
            $table->text('ques_status');
            $table->text('ques_cat');
            $table->text('user_email');
            $table->integer('sub_id');
            $table->integer('chap_id');
            $table->integer('ques_input')->length(1);            
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
        //
    }
}
