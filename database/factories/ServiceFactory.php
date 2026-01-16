<?php

namespace Database\Factories;
use App\Models\Service;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
      protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->paragraph(3),
            'author_id' => $this->faker->numberBetween(1, 5),
            'is_published' => $this->faker->boolean(60),
            'price' => $this->faker->numberBetween(50, 500),
            //
        ];
    }
}
