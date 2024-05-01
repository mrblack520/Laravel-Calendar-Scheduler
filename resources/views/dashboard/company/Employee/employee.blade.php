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
        @foreach($employee as $employees)
        <tr>
     <td>{{$employees->name}}</td>
     <td>{{$employees->email}}</td>
     <td>{{$employees->Phone_Number}}</td>
    <td>{{$employees->Mailing_Address}}</td>
    <td>{{$employees->Gender}}</td>
    <td>{{$employees->Date_of_Birth}}</td>
    <td> @if ($employees->status == 1)
        <span class="badge badge-pill badge-success"> Active</span>
      @else
        <span class="badge badge-pill badge-danger"> Inactive</span>
      @endif</td>


    <td>
     <form method="POST" action="{{ route('employee_delete', ['id' => $employees->id]) }}">
    @csrf
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <td>
        <a href="{{ route('employee_edit', ['id' => $employees->id]) }}" class="btn btn-primary">Update</a>

    </td>
    <td>
        <a href="{{ route('employee_Appointments', ['id' => $employees->id]) }}" class="btn btn-primary">Appointment</a>

        <a href="{{ route('employee_Appointments
    </td>

        </tr>
        @endforeach
      </table>
    </div>
</div>

        </section>
 @endsection
