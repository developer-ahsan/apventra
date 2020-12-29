<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
            'f_name' => 'Developer',
            'l_name' => 'Test',
            'email' => 'dev@bbits.solutions',
            'password' => 'gpssafe2018!',
            'user_type' => 'admin'
        ],[
            'f_name' => 'Cesar',
            'l_name' => 'Test',
            'email' => 'cesar@gpssafesolutions.ca',
            'password' => 'gpssafe2018!',
            'user_type' => 'admin'
        ]);	
    }
}
