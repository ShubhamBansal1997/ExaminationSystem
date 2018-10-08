<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(subjects::class);
        $this->call(chapters::class);
        $this->call(admin::class);
     $this->call(timer::class);
    }
}
