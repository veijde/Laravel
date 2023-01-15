<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $tags = ['spikeball', 'tournament', 'news', 'top players', 'exclusive', 'interview', 'world tour'];

        return [
            'title' => fake()->sentence(),
            'tags' => implode(",", fake()->randomElements($tags, 3, false)),
            'description' => fake()->paragraph(),
        ];
    }
}
