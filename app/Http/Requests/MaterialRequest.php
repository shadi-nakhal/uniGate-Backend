<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'date' => 'date_format:Y-m-d|required',
            // 'ref' => 'required|min:3|max:30|unique:samples,ref',
            'type' => 'required|min:3|max:50',
            'type_description' => 'required|min:3|max:50',
            'ticket_number' => 'required|min:3|max:30',
            'truck_number' => 'required|min:3|max:30',
            'source' => 'required|min:3|max:30',
            'test_date' => 'date_format:Y-m-d|required',
            'client_ref' => 'required|min:3|max:30|unique:materials,client_ref',
        ];
        $ValidatePost = [
            //
            'date' => 'date_format:Y-m-d|required',
            // 'ref' => 'required|min:3|max:30|unique:samples,ref',
            'type' => 'required|min:3|max:50',
            'type_description' => 'required|min:3|max:50',
            'ticket_number' => 'required|min:3|max:30',
            'truck_number' => 'required|min:3|max:30',
            'source' => 'required|min:3|max:30',
            'test_date' => 'date_format:Y-m-d|required',
            'client_ref' => 'required|min:3|max:30|unique:materials,client_ref',
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
            // 'date.required' => 'Date is required!',
            // 'ref.unique' => 'Reference already exist!',
            // 'ref.required' => 'Reference is required!',
            // 'ref.min' => 'Reference is Minimum of 3 Characters are required',
            // 'ref.max' => 'Reference is Maximum of 30 Characters are allowed',
            // 'ticket_number.required' => 'Ticket Number is required!',
            // 'ticket_number.min' => 'Ticket number is Minimum of 3 Characters are required',
            // 'ticket_number.max' => 'Ticket number is Maximum of 30 Characters are allowed',
            // 'truck_number.required' => 'Truck number is required!',
            // 'truck_number.min' => 'Truck number is Minimum of 3 Characters are required',
            // 'truck_number.max' => 'Truck number is Maximum of 30 Characters are allowed',
            // 'type.required' => 'Type is required!',
            // 'type.min' => 'Type is Minimum of 3 Characters are required',
            // 'type.max' => 'Type is Maximum of 50 Characters are allowed',
            // 'type_description.required' => 'Type description is required!',
            // 'type_description.min' => 'Type description is Minimum of 3 Characters are required',
            // 'type_description.max' => 'Type description is Maximum of 50 Characters are allowed',
            // 'source.required' => 'source is required!',
            // 'source.min' => 'source is Minimum of 3 Characters are required',
            // 'source.max' => 'source is Maximum of 30 Characters are allowed',
            // 'clinet_ref.required' => 'Client\'s Reference is required!',
            // 'clinet_ref.unique' => 'Client\'s Reference already exist!',
            // 'client_ref.min' => 'Client\'s Reference is Minimum of 3 Characters are required',
            // 'client_ref.max' => 'Client\'s Reference is Maximum of 30 Characters are allowed',
            // 'test_date.required' => 'Valid Test date is required!',

        ];
    }
}
