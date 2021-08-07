<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "task_name" => "required | string" ,
            "task_description" => "required" ,
            "group_id" => "required" ,
            "task_time" => "required_if:checkEDT,on" ,
            "task_date" => "required_if:checkEDT,on" ,
            "task_type" => "required" ,
        ];
    }
}
