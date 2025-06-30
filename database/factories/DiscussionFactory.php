<?php

namespace Database\Factories;

use App\Models\Discussion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DiscussionFactory extends Factory
{
    protected $model = Discussion::class;

    public function definition() : array
    {
        return [
            'on'         => $this->faker->word(),

            'on_id'      => $this->faker->randomNumber(),
            'status'     => $this->faker->word(),
            'title'      => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
