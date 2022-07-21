<?php

namespace App\Core\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Core\Requests\CoreRequest;
use App\Core\Entities\ApiResponser;
use Throwable;

/**
 * Abstract class Controller
 *
 * Super class for controllers
 *
 * @package namespace App\Core\Controllers;
 */

abstract class Controller extends BaseController
{
    use ApiResponser;
    
    /**
     * This is the first constructor to be called
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Validate the request rules
     *
     * @param Request $request
     * @param CoreRequest $formRequest
     *
     * @return void
     */
    protected function validateRequest(Request $request, CoreRequest $formRequest)
    {
        parent::validate($request, $formRequest->rules());
    }

    /**
     * Throw error
     *
     * Throw error formatted
     *
     * @param Throwable $e
     * @param $data
     *
     * @return $this
     */
    protected function throwError(Throwable $e, $data =[])
    {
        $code = $e->getCode();
        if (empty($code)) {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        return $this->errorResponse($data, $e->getMessage(), $code);
    }
}