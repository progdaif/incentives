<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepositoryEloquent;
use App\Models\Action;

final class ActionRepositoryEloquent extends CoreRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Action::class;
    }
}