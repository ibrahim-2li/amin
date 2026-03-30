<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'division_id' => Division::factory(),
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'icon' => null,
            'order' => $this->faker->numberBetween(1, 20),
            'is_active' => true,
        ];
    }
}
