<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class employeeController extends Controller
{
    public function Create_employee_page()
    {
        $companies = DB::table('users')->select('*')->where('role', '=', 2)->get();

        return view("dashboard.admin.Employee.create_employee", compact('companies'));
    }
    public function Create_employee(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => ['required', 'string'],
            'email' => ['required', 'string', 'email',  'unique:users'],
            'password' => ['required', 'string'],
            'contact' => ['required', 'numeric'],
            'Address' => ['required', 'string'],
            'Gender' => ['required'],
            'Date_of_Birth' => ['required', 'date'],

        ]);
        $user = new User;






        $user->name = $request['Name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->Phone_Number = $request['contact'];
        $user->Mailing_Address = $request['Address'];
        $user->Gender = $request['Gender'];
        $user->Date_of_Birth = $request['Date_of_Birth'];
        $user->status = $request->status;
        $user->company_id = $request->company;
        $user->role = 0;
        $user->save();
        return redirect()->route('employee_page')->with("contact_message", "Employee added successfully!");
    }



    public function employee_page()
    {
        $employees = DB::table('users')
        ->select('users.name as comp','u2.*')
        ->join('users as u2', 'u2.company_id', '=', 'users.id')
        ->where('u2.role', "0" )
        ->get();
         

    
        return  view('dashboard.admin.Employee.employee', [
            'employees' => $employees,
           
        ]);
    }
    public function edit($id)
    {

        $employee = user::findOrFail($id);
        return view('dashboard.admin.employee.edit_employee', compact('employee'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate(['Name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'], 'contact' => ['required', 'numeric'], 'Address' => ['required', 'string'],
            'Gender' => ['required'],
            'Date_of_Birth' => ['required', 'date'],


        ]);

        $user = User::findOrFail($id);


        $user->name = $request['Name'];
        $user->email = $request['email'];
        $user->Phone_Number = $request['contact'];
        $user->Mailing_Address = $request['Address'];
        $user->Gender = $request['Gender'];
        $user->Date_of_Birth = $request['Date_of_Birth'];
        $user->status = $request->status;
        $user->role = 0;
        $user->update();
        $employee = User::where('role', 0)->get();
        return redirect()->route('employee_page')
        ->with('update_success', 'employee updated successfully')
        ->with('employee', $employee);
    }


    public function delete($id)
    {


        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->back()->with('success', 'Employee deleted successfully');
    }

    public function employee_Appointments($id)
    {

        $events = [];
        $appointment = Appointment::all();
        $employees= User::findOrFail($id);
        $appointments = Appointment::where('user_id', $id)->get();
        
        foreach ($appointments as $appointment) {
            $clientName = $appointment->client->Name ?? 'No Client'; // Use 'No Client' as a default value if client is null

            $events[] = [
                'id' =>  $appointment->id ,
                'title' => $clientName ,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
                'comments' => $appointment->comments,

            ];
        }
      
       

        return view('dashboard.admin.Employee.employee_appointment', compact('events', 'employees', 'appointment'));
    }
    

    public function delete_appointment($id)
    {
       
        $appointment = Appointment::find($id);

    if (!$appointment) {
      
        return redirect()->back()->with('error', 'Appointment not found.');
    }


    $appointment->delete();
    return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
    public function add_appointment(Request $request , $id){
        // return auth()->user()->id;
        $company = new Client;
        $company->Name = $request->Name.' '.$request->lName ;
        $company->Email_Address = $request->Email ;
        $company->Phone_Number = $request->Phone_number ;
        $company->Mailing_Address= $request->Address ;
        $company->Gender = $request->gender  ;
        $company->save();




        // DB::table

        $appointment = new Appointment;
        $appointment->Name = $request->Name.' '.$request->lName;
        $appointment->Phone_number = $request->Phone_number;
        $appointment->Quote_number = $request->Quote_number;
        $appointment->start_time = $request->start_time;
        $appointment->finish_time = $request->finish_time;
        $appointment->comments = $request->comments;
        $appointment->client_id = $company->id;
        $appointment->user_id =$id;
        // dd($id);
        $appointment->save();
        return redirect()->route('employee_page')
        ->with('Appointment', 'Appointment created successfully');
        
      

     }
    public function edit_appointment(Request $request) {
       
        $appointmentData = $request->all();
        $appointment = Appointment::with('client')->find($appointmentData['id']);
    
        if ($appointment) {
            $start_time = date('Y-m-d H:i:s', strtotime($appointmentData['start_time']));
            $finish_time = date('Y-m-d H:i:s', strtotime($appointmentData['finish_time']));

            $appointment->client->update([
                'Name' => $appointmentData['Name'],
            ]);
    
            $appointment->update([
                'Name' => $appointmentData['Name'],
                'start_time' => $start_time,
                'finish_time' => $finish_time,
                'comments' => $appointmentData['comments'],
            ]);
       
    }
    }


}
