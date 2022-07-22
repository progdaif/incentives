<?php

namespace Tests\UserPoints;

use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
use Tests\TestCase;
use Carbon\Carbon;

abstract class UserPointsTestCase extends TestCase
{
    /**
     * Call pointsCalculator API with default user
     * and returns response body as object
     *
     * @return mixed
     */
    protected function pointsCalculator(int $userId = 1, Carbon $date = null)
    {
        // the default user inserted by seeder with id 1
        $defaultUserQueryString = '?user_id=' . $userId;
        if (!empty($date)) {
            $date = $date->format('Y-m-d H:i:s');
            $defaultUserQueryString .= '&date=' . $date;
        }
        $this->get(route('pointsCalculator') . $defaultUserQueryString);
        return json_decode($this->response->getContent());
    }

    /**
     * Assign right points permission to a user
     *
     * @return void
     */
    protected function assignPointsPermissionToUser($userId)
    {
        $permission = Permission::findByName('get-points', 'api');
        UserPermission::create([
            'permission_id' => $permission->id,
            'model_type' => User::class,
            'model_id' => $userId
        ]);
    }

    /**
     * Create a fake user to use in testing with/without
     * the right permission
     *
     * @param bool $authorized
     *
     * @return int
     */

    protected function createFakeUser(bool $authorized = false) : int
    {
        $user = User::factory()->count(1)->create()->pop();
        if ($authorized) {
            $this->assignPointsPermissionToUser($user->id);
        }
        return $user->id;
    }
}