<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Services\CoreEloquentService;
use App\Repositories\UserRepositoryEloquent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * class UserLoaderService
 *
 * Service that loads user
 *
 * @package namespace App\Services;
 */

final class UserLoaderService extends CoreEloquentService
{
    /**
     * Load UserRepositoryEloquent as main repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Load user by user_id or by authenticated user
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function user(Request $request)
    {
        /**
         * If no user_id is sent take the current authenticated user
         */
        if ($request->has('user_id')) {
            $user = $this->repository->find($request->user_id);
        } elseif (Auth::hasUser()) {
            $user = Auth::user();
        }
        if (empty($user)) {
            throw new BadRequestHttpException("User is required");
        }
        return $user;
    }
}