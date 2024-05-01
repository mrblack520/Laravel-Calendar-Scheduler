@extends("layouts.layout")
@section("main")
<div class="row">
<h1 class="text-3xl font-semibold mb-6">Dashboard</h1>
    <div class="col-md-6 col-12">
    <div class="box box-inverse box-success">
      <div class="box-header">
        <h4 class="box-title"><strong>Total Employees</strong></h4>
        <div class="box-tools pull-right">					
           
                <p class="text-3xl font-bold text-indigo-600">{{ $totalEmployees }}</p>
        </div>
      </div>
    </div>
</div>
      <div class="col-md-6 col-12">
        <div class="box box-inverse box-info">
          <div class="box-header">
            <h4 class="box-title"><strong>Total Appointments</strong></h4>
            <div class="box-tools pull-right">					
               
                <p class="text-3xl font-bold text-indigo-600">{{ $totalAppointments }}</p>
            </div>
          </div>
        </div>
    </div>
          <div class="col-md-6 col-12">
            <div class="box box-inverse box-warning">
              <div class="box-header">
                <h4 class="box-title"><strong>Total Clients</strong></h4>
                <div class="box-tools pull-right">					
                   
                    <p class="text-3xl font-bold text-indigo-600">{{ $totalClient }}</p>
                </div>
              </div>
            </div>
        </div>
              <div class="col-md-6 col-12">
                <div class="box box-inverse box-success">
                  <div class="box-header">
                    <h4 class="box-title"><strong>Total Companies</strong></h4>
                    <div class="box-tools pull-right">					
                       
                            <p class="text-3xl font-bold text-indigo-600">{{ $totalCompany }}</p>
                    </div>
                  </div>

                </div>
            </div>
</div>
       
                  

@endsection
