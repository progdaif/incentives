<?php

namespace App\Core\Services;

use App\Core\Repositories\CoreRepositoryEloquent;

/**
 * Abstract class CoreEloquentService
 *
 * Super class for services
 *
 * @package namespace App\Core\Services;
 */

abstract class CoreEloquentService
{
    /**
     * main elqouent repository for the service
     *
     * @var CoreRepositoryEloquent
     */
    protected $repository;

    /**
     * Load the main elqouent repository for the service and
     * create service instance
     *
     * @return void
     */
    public function __construct(CoreRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }
}