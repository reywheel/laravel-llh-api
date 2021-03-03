<?php

namespace Database\Factories;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParameterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parameter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender' => $this->faker->randomElement(['М', 'Ж']),
            'growth' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(50, 120),
            'user_id' => 1
        ];
    }
}
