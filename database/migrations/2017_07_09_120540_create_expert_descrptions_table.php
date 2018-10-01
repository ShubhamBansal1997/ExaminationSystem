<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertDescrptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_descrptions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('profile_pic')->nullable();
            $table->integer('benefit_percentage')->nullable();
            $table->text('availability')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->string('bank_type')->nullable();
            $table->boolean('status')->default(0);
            $table->text('details')->nullable();
            $table->text('quote')->nullable();
            $table->string('preferred_language')->default('English');
            $table->decimal('charges',13, 2)->default('0');
            $table->decimal('total_earned',13, 2)->default('0');
            $table->decimal('amount_remaining',13, 2)->default('0');
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
        Schema::dropIfExists('expert_descrptions');
    }
}
