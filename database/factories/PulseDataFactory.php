<?php

namespace Database\Factories;

use App\Models\PulseData;
use Illuminate\Database\Eloquent\Factories\Factory;

class PulseDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PulseData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'measurement_time' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'value' => $this->faker->numberBetween(40, 160),
            'user_id' => 1
        ];
    }
}
