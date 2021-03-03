<?php

namespace Database\Factories;

use App\Models\ArterialPressureData;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArterialPressureDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArterialPressureData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'measurement_time' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'systolic_value' => $this->faker->numberBetween(100, 135),
            'diastolic_value' => $this->faker->numberBetween(75, 85),
            'user_id' => 1
        ];
    }
}
