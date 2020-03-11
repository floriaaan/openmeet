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
            'iName'=>'required|min:3|max:40',
            'iSlogan' => 'min:3|max:40',
            'iPass'=>'required|confirmed|min:3',
            'iMail'=>'required|email'
        ];
    }
}
