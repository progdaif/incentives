<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepositoryEloquent;
use App\Models\Booster;

final class BoosterRepositoryEloquent extends CoreRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booster::class;
    }
}