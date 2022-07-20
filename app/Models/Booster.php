<?php

namespace App\Models;

use App\Core\Entities\CoreModel;
use App\Core\Entities\CommonModel;

class Booster extends CoreModel
{
    use CommonModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'points', 'booster_available_at', 'booster_expired_at',
        'action_id', 'actions_reapeated_times', 'actions_within_minutes',
        'actions_from_time', 'actions_to_time', 'actions_week_days'
    ];

    /**
     * Set json available week days
     *
     * @param  array  $value
     * @return void
     */
    public function setActionsWeekDaysAttribute(array $value = [])
    {
        /**
         * If no specific week days was entered
         * then it will be all days available
         */
        if (empty($value)) {
            for ($weekDay = 0;$weekDay < 7;$weekDay++) {
                $value[] = $weekDay;
            }
        }
        $weekDays = new \stdClass();
        $weekDays->availableAt = $value;
        $this->attributes['actions_week_days'] = collect($weekDays);
    }

    /**
     * Get json available week days
     *
     * @param  array  $value
     * @return void
     */
    public function getActionsWeekDaysAttribute(string $value = null) : array
    {
        if (empty($value)) {
            return [];
        }
        $value = json_decode($value);
        return $value->availableAt ?? [];
    }
}