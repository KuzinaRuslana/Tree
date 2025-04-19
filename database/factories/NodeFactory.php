<?php

namespace Database\Factories;

use App\Models\Node;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Node>
 */
class NodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Node::class;

    public function definition(): array
    {
        return [
            'title' => fake()->title(),
        ];
    }
}
