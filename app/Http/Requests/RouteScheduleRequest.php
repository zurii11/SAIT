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
            'schedule.*.time_start' => 'date_format:H:i|required',
            'schedule.*.time_end' => 'date_format:H:i|after:schedule.*.time_start',
            "days" => 'required',
        ];
    }
}
