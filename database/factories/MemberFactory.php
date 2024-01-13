<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
