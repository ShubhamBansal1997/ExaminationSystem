<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payout_id')->unique();
            $table->integer('payout_amount')->default('0');
            $table->integer('expert_id');
            $table->boolean('payout_status')->default('0');
            $table->string('bank_account_number');
            $table->string('bank_ifsc_code');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('experts_payouts');
    }
}
