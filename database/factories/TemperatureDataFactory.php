<?php

namespace Database\Factories;

use App\Models\TemperatureData;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemperatureDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TemperatureData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'measurement_time' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'value' => $this->faker->randomFloat(1, 36, 39),
            'user_id' => 1
        ];
    }
}
