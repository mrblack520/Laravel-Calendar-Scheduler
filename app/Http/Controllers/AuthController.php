<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;


use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth_user(){
        $events = [];
        $userId = auth()->user()->id;
        
        $appointments = Appointment::where('user_id', $userId )->get();
        
        foreach ($appointments as $appointment) {
             $clientName = $appointment->client->Name ?? 'No Client'; // Use 'No Client' as a default value if client is null
            $events[] = [
               'id' =>  $appointment->id ,
                'title' =>$clientName   ,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
                'comments' => $appointment->comments,
            ];


        }
       
        $role =Auth::user()->role;

        if($role == 1){
           
        $totalEmployees = User::where('role', 0)->count();
        $totalAppointments = Appointment::count();
        $totalClient = Client::count();
        $totalCompany =  User::where('role', 2)->count();

         
            return view("dashboard.admin.admin_dashboard", compact('totalEmployees', 'totalAppointments', 'totalClient' ,'totalCompany'));
           
        }elseif($role == 2){
            $totalEmployees = User::where('role', 0)->count();
            $totalAppointments = Appointment::count();
            $totalClient = Client::count();
            return view("dashboard.company.company_dashboard" , compact('totalEmployees', 'totalAppointments', 'totalClient'));
        }else{
            
            return view('dashboard.employee.user_dashboard', compact('events'));
        }
    }
    public function add_appointment(Request $request){
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
        $appointment->user_id = Auth::id();
        $appointment->save();
        return redirect()->route('dashboard')
        ->with('Appointment', 'Appointment created successfully');
        
      

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
    
}
