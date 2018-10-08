<?php

use Illuminate\Database\Seeder;

class timer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timer')->insert([
        	'id' => '1',
        	'timer' => '180',
        	
        ]);
    }
}
