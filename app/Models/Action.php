<?php

namespace App\Models;

use App\Core\Entities\CoreModel;
use App\Core\Entities\CommonModel;
use Carbon\Carbon;

class Action extends CoreModel
{
    use CommonModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'boostable', 'points'
    ];
    
    /**
     * Get the boosters related to the action
     */
    public function boosters()
    {
        return $this->hasMany(Booster::class);
    }

    /**
     * Get the active boosters related to the action
     */
    public function activeBoosters()
    {
        return $this->hasMany(Booster::class)
            ->where('booster_available_at', '<=', Carbon::now())
            ->where('booster_expired_at', '>', Carbon::now());
    }
}