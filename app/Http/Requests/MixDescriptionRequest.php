<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MixDescriptionRequest extends FormRequest
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
        $ValidatePut = [

            'description' => 'required|min:5|max:100|unique:mix_descriptions,description',
            'grade_name' => 'required|min:3|max:100',
        ];
        $ValidatePost = [

            'description' => 'required|min:3|max:100|unique:mix_descriptions,description',
            'grade_name' => 'required|min:3|max:100'

        ];

        switch ($this->method()) {
            case 'POST':
                return $ValidatePost;
            case 'PUT':
                return $ValidatePut;
        }
    }

    public function messages()
    {
        return [
            'description.required' => 'Description is required!',
            'description.min' => 'Description is too short!',
            'description.max' => 'Description is too long!',
            'grade_name.required' => 'Grade name is required!',
            'grade_name.min' => 'Grade name is too short!',
            'grade_name.max' => 'Grade name is too long!',

        ];
    }
}
