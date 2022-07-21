<?php

namespace App\Models;

use App\Core\Entities\CoreModel;
use App\Core\Entities\CommonModel;

class UserPermission extends CoreModel
{
    use CommonModel;

    protected $table = 'model_has_permissions';

    /**
     * Disable timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'permission_id', 'model_type', 'model_id'
    ];
}