<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *'id', 'expert_id', 'market_id', 'expert_name', 'user_name', 'user_email', 'user_phone', 'lead_date', 'lead_time', 'lead_charges', 'lead_expert_charges', 'lead_status'
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expert_id');
            $table->string('expert_name');
            $table->string('market_name')->nullable();
            $table->string('market_id')->nullable();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->date('user_date');
            $table->string('user_time');
            $table->string('user_charges');
            $table->string('lead_status')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
