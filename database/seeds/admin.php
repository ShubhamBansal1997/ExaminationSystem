<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name' => 'Keshav Gupta',
        	'email' => 'admin@admin.com',
        	'password' => '$2a$06$vbmNjjfo9Ld34Y9JKUVqYOz2hDj70F0UW6GQjC2tX2DlXHjgyV.Fm',
        	'a_status' => 1,

        ]);
    }
}
