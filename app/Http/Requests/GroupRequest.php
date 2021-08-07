<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
                "group_name"         => "required | string",
                "group_description"  => "string",
                "group_dates"               => "required | Array",
                "group_times"              => "required ",
                "price"           => "required | Integer",
            ];
    }
}
