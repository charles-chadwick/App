<?php

namespace Database\Factories;

use App\Enums\EncounterStatus;
use App\Models\Encounter;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EncounterFactory extends Factory
{
    protected $model = Encounter::class;

    public function definition() : array
    {
        return [
            'type'            => fake()->randomElement(['Office Visit', 'Medication Update', 'Phone Call', 'Checkup']),
            'date_of_service' => fake()->date(),
            'status'          => fake()->randomElement(EncounterStatus::class),
            'title'           => $this->faker->word(),
            'content'         => $this->faker->word(),
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

            'patient_id' => Patient::factory(),
            'owner_id'   => User::factory(),
        ];
    }
}
