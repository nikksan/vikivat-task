<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$2/ESu5/BVczaMOxWoGh7E.LCOA5BKbpcRNZxOVEnDp5z8.zF6evMG',
                'remember_token' => 'X0CbiZGDBKW1Sg9GIUXmaNICxR8JriKVXY6ejWrigRlTVCeStY3ZGO2N5Ugq',
                'created_at' => '2018-05-07 12:15:44',
                'updated_at' => '2018-05-07 12:15:44',
                'phone' => '1234567890',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$BpuSSlfRnacehYYTdTUkPeDWMKnktDi/LGXQ6GzJ2z3pZzdejWpWW',
                'remember_token' => NULL,
                'created_at' => '2018-05-07 12:16:04',
                'updated_at' => '2018-05-07 12:16:04',
                'phone' => '1234567890',
            ),
        ));
        
        
    }
}