<?php

declare(strict_types=1);

namespace Database\Factories\Utilities;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilities\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_active'=>rand(1,0)
        ];
    }
}
