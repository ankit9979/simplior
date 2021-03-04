<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;
use File;
use App\Http\Requests\CompanyRequest;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $companies=  Company::paginate(10);
      return view('company.index',compact('companies'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('company.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $input = $request->all();

      
        unset($input['_token']);
        if ($request->file('logo')) { 
            $path = "logo";
            $file=$request->file('logo');  
            $filenamewithextension = $file->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenametostore = Str::slug($filename).'_'.time().uniqid().'.'.$extension;        

            $input['logo'] = $file->storeAs('/',$filenametostore);  

        } 
        $save= Company::create($input);    
        if($save){          
            $request->session()->flash('success', 'Company added successfully');
        }else{
            $request->session()->flash('danger', 'Something went wrong while adding company');
        } 
        return redirect()->back(); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
       
        $input = $request->all();
        if ($request->file('logo')) { 
            $path = "logo";
            $file=$request->file('logo');  
            $filenamewithextension = $file->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenametostore = Str::slug($filename).'_'.time().uniqid().'.'.$extension;        

            $input['logo'] = $file->storeAs('/',$filenametostore);  
        }

        $update=  Company::findOrFail($id)->update($input);     
        if($update){            
            $request->session()->flash('success',  'Updated');
        }else{
            $request->session()->flash('danger',  'Something went wrong while update');
        }       
        return redirect()->route('companies.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company= Company::findOrFail($id);
        $url = $company->logo;    
        \Storage::delete($url);     
        Company::where('id',$id)->delete();
        session()->flash('success', 'Deleted');
        return redirect()->back();
    }
}
