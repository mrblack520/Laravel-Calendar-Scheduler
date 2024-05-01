@extends("layouts.layout")
@section("main")

		<section id="company" class="content">
  <!-- Content Wrapper. Contains page content -->
  <div class="box-body no-padding">
    <div class="table-responsive">
        <a type="button" href="{{ route('add_company') }}" class="waves-effect waves-light btn btn-outline btn-primary-light mb-5">Create Companies</a>

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
          <th>Company_name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Status</th>
          <th>Role</th>
          <th>Delete</th>
          <th>Updata</th>



        </tr>
        @foreach($company as $companies)
        <tr>
     <td>{{$companies->name}}</td>
     <td>{{$companies->email}}</td>
     <td>{{$companies->Phone_Number}}</td>
     <td>{{$companies->Mailing_Address}}</td>
<td> @if ($companies->status == 1)
  <span class="badge badge-pill badge-success"> Active</span>
@else
  <span class="badge badge-pill badge-danger"> Inactive</span>
@endif</td>
<td>
    @if ($companies->role == 1)
      <span class="badge badge-pill badge-success">Admin</span>
    @elseif ($companies->role == 0)
      <span class="badge badge-pill badge-info">Employee</span>
    @elseif ($companies->role == 2)
      <span class="badge badge-pill badge-info">Company</span>

    @endif
  </td>

<td>

  <form method="POST" action="{{ route('company.delete', ['id' => $companies->id]) }}">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
<td>


  <a href="{{ route('companies_edit', ['id' => $companies->id]) }}" class="btn btn-primary">Edit Company</a>

</td>

        </tr>
        @endforeach
      </table>
    </div>
</div>

        </section>
 @endsection
