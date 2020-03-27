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
            'iName' => 'required|max:40|profanity|',
            'iSlogan' => 'max:40|profanity|',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password|min:8',
            'fname' => 'required',
            'lname' => 'required',
            'bdate' => 'required|date|before_or_equal:-18 years'
        ];
    }
}
