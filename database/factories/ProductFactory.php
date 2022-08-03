<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            "category_id"=>$this->faker->numberBetween(1,3),
            "price"=>$this->faker->numberBetween(1000,10000000),
            "image"=>$this->faker->image(),
            "description"=>$this->faker->text(),
            "is_active"=>1,
        ];
    }
}
