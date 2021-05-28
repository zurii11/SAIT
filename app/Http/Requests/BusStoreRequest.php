<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusStoreRequest extends FormRequest
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
                "model" => "min:2|max:40|required",
                "color" => "min:2|max:40|required",
                "plate_number" => "size:7|required|unique:buses,plate_number",
                "seats" => "required|int",
                "company_id" => "required|int"
        ];
    }
}
