<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestseriessubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('testseriessubject', function(Blueprint $table) {
          $table->increments('id');
          $table->string('test_series_id')->nullable();
          $table->string('subject_name')->nullable();
          $table->string('num_of_ques')->nullable();
          
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
