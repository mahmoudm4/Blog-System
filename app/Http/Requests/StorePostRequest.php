<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>['required','min:3'],
            'desc'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'A title Must be More than 3 chars',

            'desc.required' => 'A message is required',
        ];
    }
}
