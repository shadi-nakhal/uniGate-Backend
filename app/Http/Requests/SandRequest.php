<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ValidatePut = [

            'date' => 'date_format:Y-m-d|required',
            'sand_reading' => 'required|numeric|between:8,20',
            'sand_reading2' => 'required|numeric|between:8,20',
            'clay_reading' => 'required|numeric|between:8,20',
            'clay_reading2' => 'required|numeric|between:8,20',
            'status' => 'required|boolean'
        ];
        $ValidatePost = [

            'date' => 'date_format:Y-m-d|required',
            'sand_reading' => 'required|numeric|between:8,20',
            'sand_reading2' => 'required|numeric|between:8,20',
            'clay_reading' => 'required|numeric|between:8,20',
            'clay_reading2' => 'required|numeric|between:8,20',
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
