@extends("layouts.layout")
@section("main")

<form class="form" action="{{ route('add_company') }}" method="post">

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
                <label class="form-label">Company</label>
                <input type="text" name="Company_name" class="form-control" placeholder="Company Name">
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">E-mail</label>
              <input type="text" name="email" class="form-control" placeholder="E-mail">
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
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="1">active</option>
                <option value="0">inactive</option>

              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Address</label>
            <input type="text" name="Address" class="form-control" placeholder="Address">
          </div>
        </div>






        <button type="submit" name="add_company" class="btn btn-primary">
          <i class="ti-save-alt"></i> Save
        </button>
    </div>
</form>


@endsection
