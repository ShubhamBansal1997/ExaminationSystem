<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expert_id');
            $table->string('expert_name');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_phone');
            $table->date('student_date');
            $table->string('slot');
            $table->integer('price');
            $table->string('promo_code')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('expert_bookings');
    }
}
