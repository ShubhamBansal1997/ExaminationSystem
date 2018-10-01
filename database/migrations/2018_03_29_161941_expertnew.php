<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expertnew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function(Blueprint $table) {
          $table->increments('id');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('phone')->nullable();
          $table->string('email')->nullable();
          $table->string('password')->nullable();
          $table->string('photo_of_expert')->nullable();
          $table->string('id_proof_number')->nullable();
          $table->string('id_proof_file')->nullable();
          $table->decimal('expert_benefit_percentage', 13, 2)->default('0');
          $table->decimal('tax_payment_gateway_charges', 13, 2)->default('0');
          $table->string('duration')->default('30');
          $table->string('bank_account_number')->nullable();
          $table->string('bank_ifsc_code')->nullable();
          $table->string('type_of_account')->nullable();
          $table->string('timing_available')->nullable();
          $table->text('rank_in_various_exams')->nullable();
          $table->text('quote')->nullable();
          $table->string('preferred_language')->nullable();
          $table->decimal('amount_to_be_paid',13,2)->default('0');
          $table->boolean('status')->default('0');
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
        Schema::dropIfExists('experts');
    }
}
