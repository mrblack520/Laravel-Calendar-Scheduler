@extends("layouts.layout")
@section("main")

<form method="POST" action="{{ route('employee_update', ['id' => $employee->id]) }}">
   @csrf
@method('PUT')
    <div class="box-body">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>

  @endif

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" name="Name" value="{{$employee->name}}" class="form-control" placeholder="Company Name">
      </div>
    </div>



  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label">E-mail</label>
      <input type="email" name="email"  value="{{$employee->email}}" class="form-control" placeholder="E-mail">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label">Contact Number</label>
      <input type="text" name="contact"  value="{{$employee->Phone_Number}}" class="form-control" placeholder="Phone">
    </div>
  </div>




  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label">Date of Birth</label>
      <input type="date" value="{{$employee->Date_of_Birth}}" name="Date_of_Birth" class="form-control">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>


      </select>
    </div>
  </div>


  <div class="col-md-6">
  <div class="row">


    <div class="form-group">
        {{ $employee->gender }}
        <label class="form-label">Gender:</label>
        <div class="form-check form-check-inline mt-4">
            <input type="radio" class="form-check-input" name="Gender" value="male" id="male" {{ $employee->gender == 'male' ? 'checked' : '' }}>
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline mt-4">
            <input type="radio" class="form-check-input" name="Gender" value="female" id="female" {{ $employee->gender == 'female' ? 'checked' : '' }}>
            <label class="form-check-label" for="female">Female</label>
        </div>
        <div class="form-check form-check-inline mt-4">
            <input type="radio" class="form-check-input" name="Gender" value="other" id="other" {{ $employee->gender == 'other' ? 'checked' : '' }}>
            <label class="form-check-label" for="other">Other</label>
        </div>
    </div>

      </div>

    </div>





      <div class="form-group">
        <label class="form-label">Address</label>
        <input type="text" value="{{$employee->Mailing_Address}}" name="Address" class="form-control" placeholder="Address">
      </div>
</div>


        <button type="submit"  class="btn btn-primary">
          <i class="ti-save-alt"></i> Save
        </button>
    </div>
</form>


@endsection
