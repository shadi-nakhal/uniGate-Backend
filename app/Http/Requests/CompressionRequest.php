<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompressionRequest extends FormRequest
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

            'weight' => 'required|numeric|between:10000,20000',
            'length' => 'required|numeric|between:290,310',
            'diameter' => 'required|numeric|between:145,160',
            'load' => 'required|numeric|between:0,3000',
            'status' => 'required|boolean'

        ];
        $ValidatePost = [

            'weight' => 'required|numeric|between:10000,20000',
            'length' => 'required|numeric|between:290,310',
            'diameter' => 'required|numeric|between:145,160',
            'load' => 'required|numeric|between:0,3000',
            'status' => 'required|boolean'


        ];

        switch ($this->method()) {
            case 'POST':
                return $ValidatePost;
            case 'PUT':
                return $ValidatePut;
        }
    }
}
