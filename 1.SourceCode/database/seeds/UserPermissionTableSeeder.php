<?php

use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_permission')->insert([
        	['user_permission_id' => 1, 'name_permission' => 'admin'],
        	['user_permission_id' => 2, 'name_permission' => 'user'],
        ]);
    }
}
