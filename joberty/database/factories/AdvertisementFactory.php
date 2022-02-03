<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position'=>$this->faker->word(),
            'company_id'=>Company::factory(),
            'description'=>$this->faker->paragraph(),
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
        ];
    }
}
