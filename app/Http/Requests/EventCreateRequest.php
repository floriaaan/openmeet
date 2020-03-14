<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
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
            'eName' => 'required|profanity|min:1|max:64',
            'eDesc' => 'max:255|profanity|',
            'eGroup' => 'required|numeric',
            'eDateFrom' => 'required|after_or_equal:now',
            'eDateTo' => 'after_or_equal:eDateFrom',
            'eNumStreet' => 'required|profanity|',
            'eStreet' => 'required|profanity|',
            'eCity' => 'required|profanity|',
            'eZip' => 'required|numeric',
            'eCountry' => 'required|profanity|'
        ];
    }
}
