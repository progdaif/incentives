<?php

namespace Database\Seeders;

use App\Models\UserPoint;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $expiredAt = clone $now;
        $now = $now->format('Y-m-d H:i:s');
        $expiredAt->addWeeks(3);
        $expiredAt = $expiredAt->format('Y-m-d H:i:s');
        $points = [
            // normal point from actions
            [
                'points' => 1,
                'action_id' => 1,
                'user_id' => 1
            ],
            // exchanged
            [
                'points' => 2,
                'exchanged_value' => 2,
                'exchanged_currency' => 'usd',
                'action_id' => 3,
                'user_id' => 1,
                'exchanged_at' => $now
            ],
            // boosted points
            [
                'points' => 10,
                'action_id' => 2,
                'user_id' => 1,
                'booster_id' => 2
            ],
            // exchanged with expiry
            [
                'points' => 10,
                'exchanged_value' => 10,
                'exchanged_currency' => 'usd',
                'action_id' => 2,
                'user_id' => 1,
                'expired_at' => $expiredAt,
                'exchanged_at' => $now,
                'booster_id' => 2
            ]
        ];
        foreach ($points as $point) {
            $userPoint = new UserPoint();
            $userPoint->fill($point);
            $userPoint->save();
        }
    }
}