@extends("layouts.layout")
@section("main")

	<section id="employee" class="content">
  <!-- Content Wrapper. Contains page content -->
  <div class="box-body no-padding">
    <div class="table-responsive">
        <a type="button" href="{{ route('create_employee') }}" class="waves-effect waves-light btn btn-outline btn-primary-light mb-5">Create Employee</a>
        @if (session('success'))
        <div class="alert alert-danger">
          {{ session('success') }}
      </div>
      @elseif (session('contact_message'))
      <div class="alert alert-success">
        {{ session('contact_message') }}
    </div>
    @elseif (session('update_success'))
      <div class="alert alert-success">
        {{ session('update_success') }}
    </div>
      @endif

      <table class="table table-hover">
        <tr>
          <th>Name</th>
          <th>company Name</th>
          <th>Email_Address</th>
          <th>Phone_Number</th>
          <th>Mailing_Address</th>
          <th>Gender</th>
          <th>Date_of_Birth</th>
          <th>Status</th>

          <th>Delete</th>
          <th>Update</th>
          <th>Appointments</th>





        </tr>
        @foreach($employees as $employee)
        <tr>
     <td>{{$employee->name}}</td>
     
          <td>{{$employee->comp}}</td>
     <td>{{$employee->email}}</td>
     <td>{{$employee->Phone_Number}}</td>
    <td>{{$employee->Mailing_Address}}</td>
    <td>{{$employee->Gender}}</td>
    <td>{{$employee->Date_of_Birth}}</td>
    <td> @if ($employee->status == 1)
        <span class="badge badge-pill badge-success"> Active</span>
      @else
        <span class="badge badge-pill badge-danger"> Inactive</span>
      @endif</td>


    <td>
     <form method="POST" action="{{ route('employee_delete', ['id' => $employee->id]) }}">
    @csrf
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <td>
        <a href="{{ route('employee_edit', ['id' => $employee->id]) }}" class="btn btn-primary">Update</a>

    </td>
    <td>
        <a href="{{ route('employee_Appointments', ['id' => $employee->id]) }}" class="btn btn-primary">Appointment</a>

    </td>

        </tr>
        @endforeach
      </table>
    </div>
</div>

        </section>
 @endsection
