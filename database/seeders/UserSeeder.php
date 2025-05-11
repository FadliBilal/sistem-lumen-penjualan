<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'bilal',
            'email' => 'fadlibilal783@gmail.com',
            'password' => Hash::make('12345'),
            'api_token' => 'bilal12345',
        ]);
    }
}
