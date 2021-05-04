<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent;
use App\User;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'    => 'John Smith',
            'email'    => 'john_smith@gmail.com',
            'password'   =>  Hash::make('password'),
            'role'  => 'admin',
            'remember_token' =>  Str::random(10),
        ]);
    }
}
