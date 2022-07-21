<?php

namespace App\Http\Requests;

use App\Core\Requests\CoreRequest;
use App\Models\User;
use Carbon\Carbon;

final class PointsCalculatorRequest extends CoreRequest
{
    /**
     * Get the validation rules that apply to the PointsCalculator request
     *
     * @return array
     */
    public function rules()
    {
        $now = Carbon::now();
        $now = $now->format('Y-m-d H:i:s');
        return [
            'date' => 'date_format:Y-m-d H:i:s|before:'. $now,
            'user_id' => 'numeric|exists:' . User::class . ',id'
        ];
    }
}