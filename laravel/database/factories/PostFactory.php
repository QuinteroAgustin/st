<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'sub_title' => $this->faker->title(),
            'sub_message' => $this->faker->title(),
            'message' => $this->faker->text(),
            'date' => now(),
            'active' => 1,
            'user_id' => 1,
            'created_at' => now(),
        ];
    }
}
