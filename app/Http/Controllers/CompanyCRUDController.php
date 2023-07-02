<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    // Create index Show company member
    public function index(){
        $data['companies'] = Company::orderBy('id')->paginate(5);
        return view('companies.index',$data);
    }

    public function create(){
        return view('companies.create');
    }
    public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'address'=>'required'
            ]);
            $company = new Company;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->save();
            return redirect()->route('companies.index')->with('success','Save successful');
    }
    public function edit(Company $company){
        return view('companies.edit',compact('company'));
    }

    public function update(Request $request ,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success','Edit successful');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success','Delete successful');
    }
}