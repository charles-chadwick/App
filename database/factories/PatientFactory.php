<?php

namespace Database\Factories;

use App\Enums\PatientGender;
use App\Enums\PatientStatus;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    protected static ?string $password;

    public function definition() : array
    {
        return [
            'prefix'     => $this->faker->word,
            'suffix'     => $this->faker->word,
            'status'     => fake()->randomElement(PatientStatus::class),
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'dob'        => fake()->dateTimeBetween('-70 years', '-2 years'),
            'species'    => $this->faker->word(),
            'gender'     => fake()->randomElement(PatientGender::class),
            'email'      => $this->faker->unique()->safeEmail,
            'password'   => static::$password ??= Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
