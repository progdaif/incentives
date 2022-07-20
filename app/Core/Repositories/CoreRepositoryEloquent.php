<?php

namespace App\Core\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Core\Contracts\CoreRepositoryContract;

/**
 * Abstract class CoreRepositoryEloquent
 *
 * Super eloquent repositories class
 *
 * @package namespace App\Core\Repositories;
 */
abstract class CoreRepositoryEloquent extends BaseRepository implements CoreRepositoryContract
{
    /*
     * Boot up the repository, pushing criteria
     *
     * */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}