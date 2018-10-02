<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testseries', function(Blueprint $table) {
          $table->increments('test_series_id');
          $table->string('test_series_name')->nullable();
          $table->string('num_of_mocktest')->nullable();
          $table->string('Rules1')->nullable();
          $table->string('Rules2')->nullable();
          $table->string('Rules3')->nullable();
          $table->string('Rules4')->nullable();
          $table->string('Rules5')->nullable();
          $table->string('Rules6')->nullable();
          $table->string('Rules7')->nullable();
          $table->string('Rules8')->nullable();
          $table->string('Rules9')->nullable();
          $table->string('Rules10')->nullable();
          
         
        

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
