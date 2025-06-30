<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\DiscussionPost;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DiscussionPostFactory extends Factory
{
    protected $model = DiscussionPost::class;

    public function definition() : array
    {
        return [
            'content'    => $this->faker->word(),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'discussion_id' => Discussion::factory(),
            'from_id'       => Patient::factory(),
            'to_id'         => User::factory(),
        ];
    }
}
