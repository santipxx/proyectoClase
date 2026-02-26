<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CartItemFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id'=>User::onRandomOrder()->first()->id,
            'quantity'=>fake()->numberBetween(1,5),
            'product_id'=>Product::inRandomOrder()->first()->id
        ];
    }
}
