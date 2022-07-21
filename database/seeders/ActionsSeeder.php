<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
            ['name' => 'delivery', 'boostable' => 1, 'points' => 1],
            ['name' => 'rideshare', 'boostable' => 1, 'points' => 1],
            ['name' => 'rent', 'boostable' => 0, 'points' => 2],
        ];
        Action::insert($actions);
    }
}