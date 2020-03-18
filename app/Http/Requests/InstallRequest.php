<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
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
            'iName'=>'required|min:3|max:40|profanity|',
            'iSlogan' => 'min:3|max:40|profanity|',
            'iDBHost'=>'required',
            'iDBUser'=>'required',
            'iDBPass'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'password-confirm' => 'required|same:password|min:3',
            'fname' => 'required|alpha',
            'lname' => 'required|alpha',
            'bdate' => 'required|date|before_or_equal:-18 years'
        ];
    }
}
