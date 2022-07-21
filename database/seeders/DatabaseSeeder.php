<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserWithPermissionSeeder::class);
        $this->call(ActionsSeeder::class);
        $this->call(BoostersSeeder::class);
        $this->call(UserPointsSeeder::class);
    }
}