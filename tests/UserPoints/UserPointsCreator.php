<?php

namespace Tests\UserPoints;

use App\Models\UserPoint;

trait UserPointsCreator
{
    /**
     * points data to be created
     *
     * @return void
     */
    private $pointsData;

    /**
     * The user ID that owns the points
     *
     * @return void
     */
    private $userId;
    
    /**
     * Create different user points cases according to $this->pointsData
     *
     * @return void
     */
    public function userPoints()
    {
        $count = count($this->pointsData);
        $userPoints = UserPoint::factory()
                                ->count($count)
                                ->create(['user_id' => $this->userId]);
                                
        // update dummy $userPoints with $this->pointsData
        for ($pointsIndex = 0;$pointsIndex < $count;$pointsIndex++) {
            $userPoint = $userPoints[$pointsIndex];
            $pointsData = $this->pointsData[$pointsIndex];
            $userPoint->fill($pointsData);
            $userPoint->save();
        }
    }
}