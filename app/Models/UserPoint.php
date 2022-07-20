<?php

namespace App\Models;

use App\Core\Entities\CoreModel;
use App\Core\Entities\CommonModel;

class UserPoint extends CoreModel
{
    use CommonModel;

    protected $table = 'user_points';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'action_id', 'user_id', 'expired_at', 'exchanged_at', 'booster_id'
    ];
}