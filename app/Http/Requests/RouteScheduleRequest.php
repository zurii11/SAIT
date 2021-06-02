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
            'schedule.*.start_time' => 'date_format:H:i|required',
            'schedule.*.end_time' => 'nullable|sometimes|date_format:H:i|after:schedule.*.start_time',
            'schedule.*.interval_check' => 'nullable|sometimes|accepted',
            'schedule.*.interval' => 'nullable|sometimes|int',
            "days" => 'required',
            "company_id" => "required|int",
            "route_id" => "required|int"
        ];
    }
}
