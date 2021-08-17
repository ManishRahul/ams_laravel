<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("secretadmin")
        ]);

        DB::table("roles")->insert([
            "role_name" => "Admin"]);

        $user = User::first();
        $role = Role::first();

        DB::table("role_user")->insert([
            "user_id" => $user->id,
            "role_id" => $role->id]);
    }
}
