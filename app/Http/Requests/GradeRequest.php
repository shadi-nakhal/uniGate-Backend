<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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

            'name' => 'min:3|max:3|unique:grades,name',
            'grade_number' => 'min:2|max:2|unique:grades,number',
        ];
        $ValidatePost = [

            'name' => 'required|min:3|max:3|unique:grades,name',
            'grade_number' => 'required|min:2|max:2|unique:grades,number',

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
            'name.required' => 'Grade name is required!',
            'grade_number.required' => 'Grade name is required!',
            'name.min' => 'Description is too short!',
            'name.max' => 'Description is too long!',
            'grade_number.min' => 'Grade number is too short!',
            'grade_number.max' => 'Grade number is too long!',

        ];
    }
}
