<?php

namespace Database\Factories;

use App\Models\PersonalData;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->firstName,
            'date_of_birth' => $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'address' => $this->faker->address,
            'policy_number' => $this->faker->regexify("[0-9]{16}"),
        ];
    }
}
