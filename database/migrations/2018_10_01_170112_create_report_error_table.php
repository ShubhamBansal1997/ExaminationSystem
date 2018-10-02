<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportErrorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('report_error', function (Blueprint $table) {
            $table->increments('report_id');
            $table->string('ques_id')->unique();
            $table->string('report_heading')->nullable();
            $table->string('error_description')->nullable();
            $table->string('email');
            $table->string('reply')->default('60');
            $table->string('reply_email')->nullable();
           
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
