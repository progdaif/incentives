<?php

namespace App\Core\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;

/**
 * class CoreCriteria
 *
 * Super class for criterias
 *
 * @package namespace App\Core\Criterias;
 */

abstract class CoreCriteria implements CriteriaInterface
{
    /**
     * Create instance of criteria
     *
     * @return void
     */

    public function __construct()
    {
        //
    }
}