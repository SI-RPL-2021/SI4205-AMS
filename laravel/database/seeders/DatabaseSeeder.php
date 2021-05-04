<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Database;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTablesSeeder::class);
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('assets')->insert([
                'name' => Str::random(10),
                'unique_code' => Str::random(10),
                'picture' => 'images/uploads/1642217433_cow.jpg',
                'asset_category' => Str::random(10),
                'asset_purchase_date' => '2015-12-31 00:00:00',
                'asset_purchase_price' => '12',
                'description' => Str::random(10),
                'status' =>  Str::random(10),
            ]);
        }
    }
}
