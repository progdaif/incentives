<?php

namespace Tests\UserPoints;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\UserPermission;
use PHPUnit\Framework\Exception;
use Throwable;

class PermissionValidTest extends UserPointsTestCase
{
    /**
     * A test to make sure that only users with
     * right permissions can get points
     *
     * @return void
     */
    public function testCorrectPermissionValidation()
    {
        DB::beginTransaction();
        try {
            $userId = $this->createFakeUser(true);
            $response = $this->pointsCalculator($userId);
            $this->assertStringNotContainsString(
                'permissions',
                $response->message
            );
        } catch (Throwable $e) {
            DB::rollback();
            throw new Exception('User with right permission could not access');
        }
    }
}