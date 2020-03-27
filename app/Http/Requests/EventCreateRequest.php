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
            'eName' => 'required|min:1|max:128',
            'eDesc' => '',
            'eGroup' => 'required|numeric',
            'eDateFrom' => 'required|after_or_equal:now',
            'eDateTo' => 'after_or_equal:eDateFrom',
            'eNumStreet' => '|',
            'eStreet' => '|',
            'eCity' => '|',
            'eZip' => '|',
            'eCountry' => '|',
            'elon' => '',
            'elat' => '',
            'ePic' => ''
        ];
    }
}
