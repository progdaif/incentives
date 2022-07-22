<?php

namespace Tests\UserPoints;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Exception;
use Throwable;

class PermissionInvalidTest extends UserPointsTestCase
{
    /**
     * A test to make sure that users with no
     * right permissions can't get points
     *
     * @return void
     */
    public function testInCorrectPermissionValidation()
    {
        DB::beginTransaction();
        try {
            $userId = $this->createFakeUser();
            $response = $this->pointsCalculator($userId);
            $this->assertStringContainsString(
                'permissions',
                $response->message
            );
        } catch (Throwable $e) {
            DB::rollback();
            throw new Exception('User with no permission could access');
        }
    }
}