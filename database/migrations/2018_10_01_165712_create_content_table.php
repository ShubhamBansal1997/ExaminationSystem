<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname')->unique();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password')->default('60');
            $table->string('profile_pic')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('id_proof_file')->nullable();
            $table->string('section')->nullable();
            $table->boolean('status')->default(1);
            
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
        //
    }
}
