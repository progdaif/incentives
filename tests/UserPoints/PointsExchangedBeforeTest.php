<?php

namespace Tests\UserPoints;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPUnit\Framework\Exception;
use Throwable;

class PointsExchangedBeforeTest extends UserPointsTestCase
{
    use UserPointsCreator;
    
    /**
     * Test if the points exchanged before is counted or not
     *
     * @return void
     */
    public function testExchangedPointsForUser()
    {
        DB::beginTransaction();
        try {
            $this->userId = $this->createFakeUser(true);
            $yesterday = Carbon::now()->subDays(1);
            $lastWeek = Carbon::now()->subDays(7);
            $lastMonth = Carbon::now()->subDays(30);
            $this->pointsData = [
                // should not be counted
                ['points' => 10, 'exchanged_at' => $lastWeek, 'created_at' => $lastMonth],
                ['points' => 2, 'created_at' => $lastMonth],
                ['points' => 5, 'exchanged_at' => $yesterday, 'created_at' => $lastMonth],
                ['points' => 1, 'created_at' => $lastMonth]
            ];
            $this->userPoints();
            $testTime = Carbon::now()->subDays(5);
            $response = $this->pointsCalculator($this->userId, $testTime);
            $rightPointsSum = 8;
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