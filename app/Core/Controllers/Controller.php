<?php

namespace App\Core\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Core\Requests\CoreRequest;
use App\Core\Entities\ApiResponser;
use App\Models\User;
use App\Models\UserPermission;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
     * Authenticate user based on attached permissions
     *
     * @param User $user
     * @param array $permissions
     *
     * @return void
     */
    protected function authenticate(
        User $user = null,
        array $permissions = []
    ) {
        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission)) {
                $message = 'User does not have the right permissions';
                throw new AccessDeniedHttpException($message);
            }
        }
    }

    /**
     * Validate the request rules
     *
     * @param Request $request
     * @param CoreRequest $formRequest
     *
     * @return void
     */
    protected function validateRequest(
        Request $request,
        CoreRequest $formRequest
    ) {
        /** Validate request parameters */
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
        if (empty($code) || !is_int($code)) {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        return $this->errorResponse($data, $e->getMessage(), (int) $code);
    }
}