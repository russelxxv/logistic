<?php

namespace Database\Factories\Address;

use App\Models\Address\City;
use App\Models\Address\Country;
use App\Models\Address\State;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random(),
            'state_id' => State::all()->random(),
            'city_id' => City::all()->random(),
            'postal_code' => fake()->randomNumber(),
            'address_line' => fake()->address(),
            'country_id' => Country::all()->random(),
        ];
    }
}
