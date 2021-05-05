<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'hendridevlop',
            'email' => 'hendrizf55@gmail.com',
            'password' => Hash::make('hendrizf12354')
        ]);
    }
}
