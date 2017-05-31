<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('password');
            $table->integer('max_discount')->default('60');
            $table->string('id_proof')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->string('phoneno')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('delete')->default(0);
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
        Schema::dropIfExists('markets');
    }
}
