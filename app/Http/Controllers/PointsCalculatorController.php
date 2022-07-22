<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PointsCalculatorRequest;
use App\Core\Controllers\Controller;
use App\Services\PointsCalculatorService;
use App\Services\UserLoaderService;
use Carbon\Carbon;
use Throwable;

/**
 * Class PointsController
 *
 * Class for user points calculations
 *
 * @package namespace App\Http\Controllers;
 */

class PointsCalculatorController extends Controller
{
    /**
     * Create a new concrete controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Calculate user points
     *
     * Request                 $request
     * PointsCalculatorRequest $formRequest
     * UserLoaderService       $loader
     * PointsCalculatorService $service
     *
     * @return $this
     */
    public function calculate(
        Request $request,
        PointsCalculatorRequest $formRequest,
        UserLoaderService $loader,
        PointsCalculatorService $service
    ) {
        $this->validateRequest($request, $formRequest);
        try {
            $user = $loader->user($request);
            $this->authenticate($user, ['get-points']);
            $date = null;
            if ($request->has('date')) {
                $date = $request->date;
                $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
            }
            $points = $service->calculate($user, $date);
            return $this->successResponse(
                ['points' => $points],
                "Points for user retreived successfully"
            );
        } catch (Throwable $e) {
            return $this->throwError($e);
        }
    }
}