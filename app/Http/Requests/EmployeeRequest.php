<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'first_name'  => 'required|string|max:20|min:2',
            'family_name' => 'required|string|max:20|min:2',
            'middle_name' => 'string|max:20|min:2',
            'gender'      => 'string|max:20|min:2',
            'salary'      => 'integer|digits:4'
        ];
    }
}
