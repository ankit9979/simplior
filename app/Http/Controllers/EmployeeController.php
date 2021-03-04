<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=  Employee::paginate(10);
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $companies=  Company::all();
       return view('employee.create',compact('companies'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
       $input = $request->all();


       $this->validate($request, [
        'first_name' =>'required',  
        'last_name' =>'required',
        'email' =>'required|email', 
        'company_id' =>'required',
    ]); 
       unset($input['_token']);

       $save= Employee::create($input);    
       if($save){          
        $request->session()->flash('success', 'Employee added successfully');
    }else{
        $request->session()->flash('danger', 'Something went wrong while adding company');
    } 
    return redirect()->route('employees.index');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $employee = Employee::with('company')->where('id',$id)->first();
       return view('employee.show',compact('employee'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $companies=  Company::all();
       $employee = Employee::find($id);
       return view('employee.edit',compact('employee','companies'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {

       $this->validate($request, [
        'first_name' =>'required',  
        'last_name' =>'required',
        'email' =>'required|email', 
        'company_id' =>'required', 
      ]); 
         $input = $request->all();
       $update=  Employee::findOrFail($id)->update($input);     
       if($update){            
        $request->session()->flash('success',  'Updated');
        }else{
            $request->session()->flash('danger',  'Something went wrong while update');
        }       
        return redirect()->route('employees.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Employee::where('id',$id)->delete();
        session()->flash('success', 'Deleted');
       return redirect()->route('employees.index');
    }
}
