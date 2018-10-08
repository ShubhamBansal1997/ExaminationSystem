<?php

use Illuminate\Database\Seeder;

class subjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
        	'sub_id' => 1,
            'sub_name' => 'Physics',
        ]);
        DB::table('subjects')->insert([
        	'sub_id' => 2,
            'sub_name' => 'Chemistry',
        ]);
        DB::table('subjects')->insert([
            'sub_id' => 3,
            'sub_name' => 'Biology',
 ]);
        DB::table('subjects')->insert([
            'sub_id' => 4,
            'sub_name' => 'Test Series NEET',
 ]);
        DB::table('subjects')->insert([
            'sub_id' => 5,
            'sub_name' => 'Test Series AIIMS',
 ]);
        DB::table('subjects')->insert([
            'sub_id' => 6,
            'sub_name' => 'Test Series JIPMER', ]);
        DB::table('subjects')->insert([
            'sub_id' => 7,
            'sub_name' => 'Test Series EAMCET',

        

        ]);
    }
}
