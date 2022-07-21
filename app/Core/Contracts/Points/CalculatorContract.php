<?php

namespace App\Core\Contracts\Points;

use Carbon\Carbon;
use App\Models\User;

/**
 * Interface CalculatorContract
 *
 * Contract for points calculator
 *
 * @package namespace App\Core\Contracts\Points;
 */
interface CalculatorContract
{
    /**
     * Calculate user points at specific time
     *
     * @param User $user
     * @param Carbon $date
     *
     * @return int
     */
    public function calculate(User $user, Carbon $date = null) : int;
}