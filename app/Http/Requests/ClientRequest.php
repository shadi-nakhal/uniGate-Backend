<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            //
            'name' => 'min:3|max:30',
            'email' => 'email|unique:clients,email',
            'address' => 'min:3|max:100',
            'phone' => 'phone:auto',
        ];
        $ValidatePost = [
            //
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:clients,email',
            'address' => 'required|min:3|max:100',
            'phone' => 'required|phone:auto',
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
            'name.required' => 'Name is required!',
            'name.min' => 'Minimum of 3 Characters are required',
            'name.max' => 'Maximum of 30 Characters are allowed',
            'email.required' => 'Email is required!',
            'email.email' => 'Email is Invalid',
            'phone.phone' => 'Invalid phone number',
        ];
    }
}
