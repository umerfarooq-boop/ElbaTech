<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $employee = new Employee();
        $employee->fname = $validation['fname'];
        $employee->lname = $validation['lname'];
        $employee->email = $validation['email'];
        $employee->phone = $validation['phone'];
        $employee->company_id = $request->company_id;
        $employee->save();
        return redirect()->back()->with('success','Record Addded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with('company')->find($id);
        $companies = Company::all();
        return view('employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;
        $employee->save();
        return redirect()->back()->with('success','Record Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        if($employee){
            $employee->delete();
            return redirect()->back()->with('success','Record Delete Successfully');
        }
    }


    // Employee Data

    public function EmployeeData(){
        $employee = User::where('id' ,Auth::user()->id)->first();
        return view('employee_roles.index',compact('employee'));
    }

    public function EditEmployee($id){
        $employee = User::find($id);
        return view('employee_roles.edit',compact('employee'));
    }

    public function ResetInformation(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success','Record Updated');
    }

}

