<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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

            'name' => 'min:4|max:100|unique:Fracture,type',
        ];
        $ValidatePost = [

            'type' => 'required|min:4|max:100|unique:Fracture,type',

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
            'type.required' => 'type is required!',
            'type.max' => 'type is too long!',

        ];
    }
}
