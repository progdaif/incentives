<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Core\Criterias\CoreCriteria;
use Carbon\Carbon;
use App\Models\User;

/**
 * class PointsCalculatorCriteria
 *
 * Criteria for points calculation for a user at specific time
 *
 * @package namespace App\Criterias;
 */

final class PointsCalculatorCriteria extends CoreCriteria
{
    /**
     * User who owns the points
     *
     * @var User
     */
    private $user;

    /**
     * Date when the points should exist in user account
     *
     * @var Carbon
     */
    private $date;
    
    /**
     * Create instance of this criteria
     *
     * @return void
     */
    public function __construct(User $user, Carbon $date)
    {
        parent::__construct();
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * Apply this criteria in query UserPoints repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $date = $this->date->format('Y-m-d H:i:s');
        $userId = $this->user->id;
        $query = $model->selectRaw('SUM(points) AS user_points')
                        ->where('user_id', '=', $userId)
                        ->where('expired_at', '>', $date)
                        ->whereNull('exchanged_at')
                        ->where('created_at', '<=', $date);
        return $query;
    }
}