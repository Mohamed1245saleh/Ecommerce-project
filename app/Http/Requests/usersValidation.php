<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usersValidation extends FormRequest
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
            "first_name" => "required | string",
            "last_name"  => "required | string",
            "number"    => "required | numeric",
            "address"   => "required | string",
            "email"     => "required ",
            "password"  => "required | min:6 |regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/",
        ];
    }
}
