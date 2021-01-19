<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//        factory(\App\brand::class,20)->create();
        factory(\App\size::class,20)->create();
//        factory(\App\color::class,20)->create();
    }
}
