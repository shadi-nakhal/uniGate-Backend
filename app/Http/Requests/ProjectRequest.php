<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'min:3|max:30|unique:projects,name',
            'location' => 'required',
            'contact_firstname' => 'min:3|max:30',
            'contact_lastname' => 'min:3|max:30',
            'contact_phone' => 'phone:auto',
            'contact_email' => 'email|',
            'engineer_firstname' => 'min:3|max:30',
            'engineer_lastname' => 'min:3|max:30',
            'engineer_phone' => 'phone:auto',
            'engineer_email' => 'email|',
        ];
        $ValidatePost = [
            //
            'name' => 'required|min:3|max:30|unique:projects,name',
            'location' => 'required',
            'engineer_firstname' => 'required|min:3|max:30',
            'engineer_lastname' => 'required|min:3|max:30',
            'engineer_phone' => 'required|phone:auto',
            'engineer_email' => 'required|email',
            'contact_firstname' => 'required|min:3|max:30',
            'contact_lastname' => 'required|min:3|max:30',
            'contact_phone' => 'required|phone:auto',
            'contact_email' => 'required|email|',
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
            'name.unique' => 'Project name already exist',
            'engineer_name.min' => 'Minimum of 3 Characters are required',
            'engineer_name.max' => 'Maximum of 30 Characters are allowed',
            'engineer_email.email' => 'Email is Invalid',
            'engineer_phone.phone' => 'Invalid phone number',
        ];
    }
}
