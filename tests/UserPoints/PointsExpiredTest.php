<?php

namespace Tests\UserPoints;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPUnit\Framework\Exception;
use Throwable;

class PointsExpiredTest extends UserPointsTestCase
{
    use UserPointsCreator;
    
    /**
     * Test if the expired points is counted or not
     *
     * @return void
     */
    public function testExpiredPointsForUser()
    {
        DB::beginTransaction();
        try {
            $this->userId = $this->createFakeUser(true);
            $lastWeek = Carbon::now()->subDays(7);
            $lastMonth = Carbon::now()->subDays(7);
            $nextWeek = Carbon::now()->addDays(7);
            $this->pointsData = [
                ['points' => 1, 'created_at' => $lastMonth, 'expired_at' => $nextWeek],
                ['points' => 5, 'created_at' => $lastMonth],
                ['points' => 5, 'created_at' => $lastMonth],
                // should not be counted
                ['points' => 10, 'created_at' => $lastMonth, 'expired_at' => $lastWeek],
            ];
            $this->userPoints();
            $testTime = Carbon::now()->subDays(2);
            $response = $this->pointsCalculator($this->userId, $testTime);
            $rightPointsSum = 11;
            $this->assertEquals(
                $rightPointsSum,
                $response->payload->points
            );
        } catch (Throwable $e) {
            DB::rollback();
            throw new Exception('Could not calculate points right');
        }
    }
}