<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array('Manager','Employee');
        foreach($roles as $role){
            DB::table("roles")->insert([
                "role_name" => $role]);
        }
    }
}
