<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Division>
 */
class DivisionFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement([
            'Secure Identity & Digital Trust',
            'Advanced Packaging Technologies',
            'Smart Printing Solutions',
            'Education & Knowledge Systems',
            'Intelligent Logistics & Fulfilment',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'tagline' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(3),
            'long_description' => $this->faker->paragraphs(4, true),
            'hero_image' => null,
            'icon' => null,
            'color' => $this->faker->randomElement(['#1e3a5f', '#0f4c75', '#1b262c', '#0a3d62', '#1e272e']),
            'order' => $this->faker->unique()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
