<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepositoryEloquent;
use App\Models\User;

class UserRepositoryEloquent extends CoreRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}