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
           'first_name' =>'required',  
           'last_name' =>'required',
           'email' =>'required|email', 
           'company_id' =>'required', 
       ];
   }

     /**
     * Custom message for validation
     *
     * @return array
     */
     public function messages()
     {
        return [
            'first_name.required' => 'First Name is required!',
            'last_name.required' => 'Last Name is required!',
            'email.required' => 'required is required!',
            'company_id.required' => 'Company name is required!'
        ];
    }
}
