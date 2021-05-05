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
            'name' => 'hendridev',
            'username' => 'Nam Do San',
            'email' => 'hendridevlp@gmail.com',
            'password' => 'hendrizf12354'
        ]);
    }
}
