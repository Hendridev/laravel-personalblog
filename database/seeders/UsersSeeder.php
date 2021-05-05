<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Nam Do San',
            'username' => 'hendridev',
            'email' => 'hendevloper@gmail.com',
            'password' => 'hendrizf12354'
        ]);
    }
}
