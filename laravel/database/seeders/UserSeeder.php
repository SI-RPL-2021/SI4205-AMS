<?php

namespace Database\Seeders;

use App\Models\User;

use illuminate\support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
            'remember_token' => Str::random(60),
            
        ]);
    }
}
