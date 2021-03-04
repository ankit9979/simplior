<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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

       if(request()->isMethod('post'))
       {
        return [
          'name' =>'required',  
          'email' =>'required|email', 
          'website' =>'required',          
          'logo' => 'required|dimensions:max_width=100,max_height=100',
      ];
  }
  elseif(request()->isMethod('PUT'))
  {

      return [
          'name' =>'required',  
          'email' =>'required|email', 
          'website' =>'required',    
          'logo' => 'dimensions:max_width=100,max_height=100',      
          
      ];
  }  


}
}
