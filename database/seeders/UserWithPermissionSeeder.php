<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserWithPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Insert user : mark
         */
        $user = new User();
        $user->fill([
            'name' => 'Mark',
            'email' => 'mark@incentives.pro',
            'password' => '123456'
        ]);
        $user->save();
        /**
         * Insert permission : get-points
         */
        $permission = new Permission();
        $permission->fill([
            'name' => 'get-points',
            'guard_name' => 'api',
        ]);
        $permission->save();
        /**
         * Assign permission : get-points to user : mark
         */
        $userPermission = new UserPermission();
        $userPermission->fill([
            'permission_id' => $permission->id,
            'model_type' => User::class,
            'model_id' => $user->id
        ]);
        $userPermission->save();
    }
}