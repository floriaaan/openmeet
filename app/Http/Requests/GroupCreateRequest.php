<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupCreateRequest extends FormRequest
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
            'gName' => 'required|min:1|profanity|max:40',
            //'gPic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gDesc' => 'max:255|profanity|',
            'gAdminID' => 'required|numeric'
        ];
    }
}
