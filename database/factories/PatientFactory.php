<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition() : array
    {
        return [
            'status'        => $this->faker->word(),
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'dob'           => fake()->dateTimeBetween('-70 years', '-2 years'),
            'species'       => $this->faker->word(),
            'gender'        => $this->faker->word(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'created_by_id' => User::factory(),
        ];
    }
}
