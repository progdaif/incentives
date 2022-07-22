<?php

namespace Database\Factories;

use App\Models\UserPoint;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'points' => 1,
            'action_id' => 1,
            'user_id' => 0,
            'created_at' => Carbon::now()
        ];
    }
}