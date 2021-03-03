<?php

namespace Database\Seeders;

use App\Models\ArterialPressureData;
use App\Models\Parameter;
use App\Models\PersonalData;
use App\Models\PulseData;
use App\Models\SleepData;
use App\Models\TemperatureData;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)
            ->has(Parameter::factory()->count(1), 'parameter')
            ->has(PersonalData::factory()->count(1), 'personalData')
            ->has(SleepData::factory()->count(10), 'sleepData')
            ->has(ArterialPressureData::factory()->count(10), 'arterialPressureData')
            ->has(PulseData::factory()->count(10), 'pulseData')
            ->has(TemperatureData::factory()->count(10), 'temperatureData')
            ->create();
    }
}
