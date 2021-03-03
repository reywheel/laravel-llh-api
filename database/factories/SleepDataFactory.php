<?php

namespace Database\Factories;

use App\Models\SleepData;
use Illuminate\Database\Eloquent\Factories\Factory;

class SleepDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SleepData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'hours' => $this->faker->numberBetween(4, 10),
            'minutes' => $this->faker->numberBetween(0, 59),
            'user_id' => 1
        ];
    }
}
