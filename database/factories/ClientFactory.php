<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entreprise' => $this->faker->unique()->company,
            'contact' => $this->faker->name('male'),
            'telephone' => $this->faker->unique()->phoneNumber,
            'fax' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'details' => $this->faker->words(5, true),
            'ice' => $this->faker->unique()->regexify('[0-9]{15}'),
            'rc' => $this->faker->unique()->regexify('[0-9]{5}'),
        ];
    }
}
