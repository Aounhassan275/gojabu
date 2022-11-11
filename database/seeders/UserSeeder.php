<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 
                'name' => 'User 1',
                'email' => 'user1@mail.com',
                'password' => Hash::make('1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [ 
                'name' => 'User 2',
                'email' => 'user2@mail.com',
                'password' => Hash::make('1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
