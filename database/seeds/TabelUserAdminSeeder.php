<?php

use Illuminate\Database\Seeder;

class TabelUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete users table records
        DB::table('users')->delete();
        //insert some dummy records
        DB::table('users')->insert(array(
        array('name'=>'SuperAdmin','username'=>'admin','password'=>bcrypt('admin'),'user_level'=>'5','pengelola'=>'5'),

    ));
    }
}
