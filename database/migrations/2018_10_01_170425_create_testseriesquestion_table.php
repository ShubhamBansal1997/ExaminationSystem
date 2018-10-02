<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestseriesquestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('testseriesquestion', function(Blueprint $table) {
          $table->increments('id');
          $table->string('test_series_id')->nullable();
          $table->string('mock_test_id')->nullable();
          $table->string('Rules1')->nullable();
          $table->longtext('ques_exp');
          $table->longtext('ques_ans1');
          $table->longtext('ques_ans2');
          $table->longtext('ques_ans3');
          $table->longtext('ques_ans4');
          $table->integer('ques_ans')->length(1);
       $table->timestamps();
          $table->longtext('ques_ar');
          $table->longtext('email');
      
          
         
        

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
