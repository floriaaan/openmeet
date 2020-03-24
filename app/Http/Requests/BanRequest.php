<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanRequest extends FormRequest
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
            'banisher' => 'required|numeric',
            'banned' => 'required|numeric',
            'description' => 'required|min:30'
        ];
    }
}
