<?php

namespace Database\Seeders;

use App\Models\Booster;
use Illuminate\Database\Seeder;

class BoostersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boosters = [
            [
                'name' => 'DELIVERY5X2H',
                'points' => 5,
                'action_id' => 1,
                'actions_reapeated_times' => 5,
                'actions_within_minutes' => 120
            ],
            [
                'name' => 'RIDESHARE5X8H',
                'points' => 10,
                'action_id' => 2,
                'actions_reapeated_times' => 5,
                'actions_within_minutes' => 480
            ]
        ];
        foreach ($boosters as $booster) {
            $boosterObj = new Booster();
            $boosterObj->fill($booster);
            $boosterObj->save();
        }
    }
}