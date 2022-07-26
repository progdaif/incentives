<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepositoryEloquent;
use App\Models\UserPoint;

final class UserPointRepositoryEloquent extends CoreRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserPoint::class;
    }
}