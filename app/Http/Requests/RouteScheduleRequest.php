<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'schedules.*.start_time' => 'date_format:H:i|required',
            'schedules.*.end_time' => 'nullable|sometimes|date_format:H:i|after:schedules.*.start_time',
            'schedules.*.interval_check' => 'nullable|sometimes|boolean',
            'schedules.*.interval' => 'nullable|sometimes|int',
            "days" => 'required',
            "company_id" => "required|int",
            "route_id" => "required|int"
        ];
    }
}
