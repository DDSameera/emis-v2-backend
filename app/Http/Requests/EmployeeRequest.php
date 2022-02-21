<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class EmployeeRequest extends FormRequest
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
        //  var_dump($this->request->all());
        $rules = [
            'birth_date' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'hire_date' => 'required',

            //Salaries
            'salaries.*' => 'required|array',
//            'salaries.salary' => 'required',
//            'salaries.from_date' => 'required',
//            'salaries.to_date' => 'required',

            //Designations
            'designations.*' => 'required|array'
//            'designations.title' => 'required',
//            'designations.from_date' => 'required',
//            'designations.to_date' => 'required',

        ];

        return $rules;
    }
}
