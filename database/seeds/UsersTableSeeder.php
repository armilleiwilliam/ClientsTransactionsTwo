<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'William Armillei',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);
    }
}
