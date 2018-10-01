<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewExpertBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertsbooking', function(Blueprint $table) {
          $table->increments('id');
          $table->string('expert_id');
          $table->string('booking_expert_name');
          $table->date('booking_date');
          $table->string('booking_time');
          $table->decimal('booking_charges', 13,2);
          $table->string('booking_promo_code')->nullable();
          $table->decimal('booking_promo_off', 13, 2)->default('0');
          $table->decimal('booking_expert_charges');
          $table->string('booking_user_name');
          $table->string('booking_user_email');
          $table->string('booking_user_phone');
          $table->boolean('booking_payment')->default('0');
          $table->string('booking_payment_gateway_id')->nullable();
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
        Schema::dropIfExists('expertsbooking');
    }
}
