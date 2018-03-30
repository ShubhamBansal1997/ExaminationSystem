<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClubDescriptionAndExpert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experts', function(Blueprint $table) {
          $table->integer('benefit_percentage')->nullable();
          $table->text('availability')->nullable();
          $table->string('bank_account_number')->nullable();
          $table->string('bank_ifsc_code')->nullable();
          $table->string('bank_type')->nullable();
          $table->text('details')->nullable();
          $table->text('quote')->nullable();
          $table->string('preferred_language')->default('English');
          $table->decimal('charges', 13, 2)->default('0');
          $table->decimal('total_earned', 13, 2)->default('0');
          $table->decimal('amount_remaining', 13, 2)->default('0');
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
