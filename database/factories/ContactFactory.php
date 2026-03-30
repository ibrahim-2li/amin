<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'company' => $this->faker->optional()->company(),
            'subject' => $this->faker->sentence(4),
            'message' => $this->faker->paragraphs(2, true),
            'status' => $this->faker->randomElement(['new', 'read']),
            'read_at' => $this->faker->optional()->dateTimeThisMonth(),
        ];
    }

    public function unread(): static
    {
        return $this->state(['status' => 'new', 'read_at' => null]);
    }
}
