<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class CompanyController extends Controller
{
    public function add_company_page()
    {
        
        return view("dashboard.admin.company.add_company");
    }
    public function add_company(Request $request)
    {
        $validatedData = $request->validate([
            'Company_name' => ['required', 'string'],
            'Address'=> ['required', 'string' ],
            'email' => ['required', 'string', 'email',  'unique:users'],
            'contact' => ['required', 'numeric'],
            'password' =>['required', 'string'],

        ]);
        $user = new User;
        $user->name = $request['Company_name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->Phone_Number = $request['contact'];
        $user->Mailing_Address = $request['Address'];
        $user->status = $request->status;
        $user->role = 2;
        $user->save();
        return redirect()->route('company_page')->with("contact_message", "Company added successfully!");



    }



    public function company_page(){
        $company = User::where('role', 2)->get();

        return view("dashboard.admin.company.companyies", compact('company'));

    }
    public function editCompany($id) {
        $company = User::findOrFail($id);
        return view('dashboard.admin.company.edit_company', compact('company'));
    }

    public function update(Request $request, $id) {



        $validatedData = $request->validate([
            'Company_name' => ['required', 'string'],
            'Address' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'contact' => ['required', 'numeric'],


        ]);


        $user = User::findOrFail($id);

        $user->name = $request['Company_name'];
        $user->email = $request['email'];
        $user->Phone_Number = $request['contact'];
        $user->Mailing_Address = $request['Address'];
        $user->status = $request->status;
        $user->role = 2;
        $user->update();
        $company = User::all();
        return redirect()->route('company_page')
        ->with('update_success', 'Company updated successfully')
        ->with('company', $company);
    }

    public function deleteCompany($id)
{
  
    $user = User::findOrFail($id);
 
    $user->delete();

    return redirect()->back()->with('success', 'Company deleted successfully');
}
  


}
