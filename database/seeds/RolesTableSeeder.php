<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user',
                'description' => 'Simple user',
                'created_at' => '2018-05-07 12:12:48',
                'updated_at' => '2018-05-07 12:12:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'description' => 'Admin with permissions',
                'created_at' => '2018-05-07 12:12:48',
                'updated_at' => '2018-05-07 12:12:48',
            ),
        ));
        
        
    }
}