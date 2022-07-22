<?php

namespace Tests\UserPoints;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPUnit\Framework\Exception;
use Throwable;

class PointsCalculationTest extends UserPointsTestCase
{
    use UserPointsCreator;
    /**
     * Test to check if the user points are calculated right
     * at specific time
     *
     * @return void
     */
    public function testPointsForUser()
    {
        DB::beginTransaction();
        try {
            $this->userId = $this->createFakeUser(true);
            $yesterday = Carbon::now()->subDays(1);
            $lastWeek = Carbon::now()->subDays(7);
            $this->pointsData = [
                ['points' => 1, 'created_at' => $lastWeek],
                ['points' => 2, 'created_at' => $lastWeek],
                ['points' => 5, 'created_at' => $yesterday], // should not be counted
                ['points' => 10, 'created_at' => $lastWeek]
            ];
            $this->userPoints();
            $testTime = Carbon::now()->subDays(4);
            $response = $this->pointsCalculator($this->userId, $testTime);
            $rightPointsSum = 13;
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