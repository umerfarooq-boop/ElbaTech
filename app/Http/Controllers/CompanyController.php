<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Mail\CompanyRegistration;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $companyLogo = $request->file('logo');
        $extension = $companyLogo->getClientOriginalExtension();
        $logo_name = time().'.'.$extension;
        $companyLogo->move(public_path('uploads/CompanyLogo'),$logo_name);

        $company = new Company();
        $company->company_name = $validation['company_name'];
        $company->email = $validation['email'];
        $company->website = $validation['website'];
        $company->logo = $logo_name;
        $company->save();
        Mail::to($company->email)->send(new CompanyRegistration($company));
        return redirect()->back()->with('success','Company Created Successfully');

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
        $company = Company::find($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $company->company_name = $request->input('company_name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        if ($request->hasFile('logo')) {
            if ($company->logo && file_exists(public_path('uploads/CompanyLogo/' . $company->logo))) {
                unlink(public_path('uploads/CompanyLogo/' . $company->logo));
            }
        $companyLogo = $request->file('logo');
        $imageName = time() . '.' . $companyLogo->getClientOriginalExtension();
        $companyLogo->move(public_path('uploads/CompanyLogo'), $imageName);
        $company->logo = $imageName;
    }

    $company->save();

    return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return redirect()->back()->with('success', 'Company deleted successfully.');
        }
        return redirect()->back()->with('error', 'Company not found.');
    }
    
}
