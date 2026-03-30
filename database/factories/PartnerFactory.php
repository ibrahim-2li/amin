<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Partner>
 */
class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'logo' => null,
            'website' => $this->faker->url(),
            'category' => $this->faker->randomElement(['technology', 'government', 'finance', 'general']),
            'order' => $this->faker->numberBetween(1, 50),
            'is_active' => true,
        ];
    }
}
