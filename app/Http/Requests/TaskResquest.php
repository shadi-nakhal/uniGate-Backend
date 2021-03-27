<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskResquest extends FormRequest
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

            'test_name' => 'unique:tasks,test_name,NULL,sample_id,sample_id,' . request('sample_id'),

        ];
        $ValidatePost = [

            'test_name' => 'required|unique:tasks,test_name,NULL,sample_id,sample_id,' . request('sample_id'),
            'sample_id' => 'required',
            'sample_type' => 'required',



        ];

        switch ($this->method()) {
            case 'POST':
                return $ValidatePost;
            case 'PUT':
                return $ValidatePut;
        }
    }
}
