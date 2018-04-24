<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_email');
            $table->string('user_email');
            $table->integer('coupon_percent');
            $table->integer('price');
            $table->integer('final_amount');
            $table->integer('coupon_name');
            $table->integer('admin_share');
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
        Schema::dropIfExists('coupon__activities');
    }
}
