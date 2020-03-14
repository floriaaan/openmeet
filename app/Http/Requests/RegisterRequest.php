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
            'rPass' => 'required|confirmed|min:3',
            'rFName' => 'required|alpha|min:1',
            'rLName' => 'required|alpha|min:1',
            'rBDate' => 'required|date|before_or_equal:-18 years'
        ];
    }
}
