<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestseriesquestionattemptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('testseriesquestionattempt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email');
            $table->text('correct');
            $table->text('incorrect');
            $table->text('review');
            $table->integer('quesid'); });
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
