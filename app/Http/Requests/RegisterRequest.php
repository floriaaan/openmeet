<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'password-confirm' => 'required|same:password|min:3',
            'fname' => 'required|alpha|min:1',
            'lname' => 'required|alpha|min:1',
            'bdate' => 'required|date|before_or_equal:-18 years'
        ];
    }
}
