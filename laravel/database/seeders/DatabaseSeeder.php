<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        \App\Models\Category::factory(10)->create();
        \App\Models\Asset::factory(10)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $categories =  \App\Models\Category::all();

        // Populate the pivot table
        \App\Models\Asset::all()->each(function ($assets) use ($categories) {
            $assets->categories()->attach(
                $categories->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
