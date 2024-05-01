@extends("layouts.layout")
@section("main")

<form class="form" action="{{ route('create_employee') }}" method="post">
    @csrf
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
                <input type="text" name="Name" class="form-control" placeholder="Employee-Name">
              </div>
            </div>



          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control" placeholder="E-mail">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Contact Number</label>
              <input type="text" name="contact" class="form-control" placeholder="Phone">
            </div>
          </div>




          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="Date_of_Birth" class="form-control">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="1">active</option>
                <option value="0">inactive</option>

              </select>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Gender:</label>
                    <div class="form-check form-check-inline mt-4">
                    <input type="radio" class="form-check-input" name="Gender" value="male" id="male">
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline mt-4">
                    <input type="radio" class="form-check-input" name="Gender" value="female" id="female">
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                  <div class="form-check form-check-inline mt-4">
                    <input type="radio" class="form-check-input" name="Gender" value="other" id="other">
                    <label class="form-check-label" for="other">Other</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Company</label>
                  <select name="company" class="form-select">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>







              <div class="form-group">
                <label class="form-label">Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Address">
              </div>
        </div>






        <button type="submit"  class="btn btn-primary">
          <i class="ti-save-alt"></i> Save
        </button>
    </div>
</form>


@endsection
