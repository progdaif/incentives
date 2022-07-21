<?php

namespace App\Services;

use App\Core\Services\CoreEloquentService;
use App\Core\Contracts\Points\CalculatorContract;
use App\Models\User;
use App\Repositories\UserPointRepositoryEloquent;
use App\Criterias\PointsCalculatorCriteria;
use Carbon\Carbon;

/**
 * class CoreEloquentService
 *
 * Service calculates user's balance of points in specific time
 *
 * @package namespace App\Services;
 */

final class PointsCalculatorService extends CoreEloquentService implements CalculatorContract
{
    /**
     * Load UserPointRepositoryEloquent as main repository
     *
     * @return void
     */
    public function __construct(UserPointRepositoryEloquent $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Calculate user points at specific time
     *
     * @param User $user
     * @param Carbon $date
     *
     * @return int
     */
    public function calculate(User $user, Carbon $date = null) : int
    {
        /**
         * If no time was assigned then it calculates points right now
         */
        if (empty($date)) {
            $date = Carbon::now();
        }
        $criteria = new PointsCalculatorCriteria($user, $date);
        $this->repository->pushCriteria($criteria);
        $points = $this->repository->first($criteria);
        if (empty($points) || empty($points->user_points)) {
            $points = 0;
        } else {
            $points = $points->user_points;
        }
        return $points;
    }
}