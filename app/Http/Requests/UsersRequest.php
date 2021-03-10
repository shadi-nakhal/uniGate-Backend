<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $ValidatePost = [
            //
            'firstname' => 'required|min:3|max:25',
            'lastname' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|phone:auto',
            'ext' => 'required|min:3|max:3',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];

        $ValidatePut = [
            //
            'firstname' => 'min:3|max:25',
            'lastname' => 'min:3|max:25',
            'email' => 'email',
            'mobile' => 'phone:auto',
            'ext' => 'min:3|max:3',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:5120',
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
            'firstname.required' => 'Name is required!',
            'firstname.min' => 'Minimum of 3 Characters are required',
            'lastname.required' => 'Name is required!',
            'lastname.min' => 'Minimum of 3 Characters are required',
            'email.required' => 'Email is required!',
            'email.email' => 'Email is Invalid',
            'image.required' => 'Image is required!',
        ];
    }
}
