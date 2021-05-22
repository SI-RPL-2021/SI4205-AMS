<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'unique_code' => $this->faker->numerify('A####'),
            'picture' => 'images/banner/banner-' . rand(1, 40) . '.jpg',
            'asset_purchase_date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'asset_purchase_price' => $this->faker->numerify('########'),
            'description' =>$this->faker->paragraph,
            'qty' => $this->faker->numerify('#'),

        ];
        
    }
    

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
