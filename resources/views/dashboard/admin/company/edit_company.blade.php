@extends("layouts.layout")
@section("main")

<form class="form"  method="POST" action="{{ route('companies.update',  ['id' => $company->id]) }}">

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
                <label class="form-label">Company</label>
                <input type="text" name="Company_name" value="{{$company->name}}" class="form-control" placeholder="Company Name">
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">E-mail</label>
              <input type="text" name="email" value="{{$company->email}}" class="form-control" placeholder="E-mail">
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Contact Number</label>
              <input type="text" name="contact" value="{{$company->Phone_Number}}" class="form-control" placeholder="Phone">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $company->status == 0 ? 'selected' : '' }}>Inactive</option>


              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Address</label>
            <input type="text" name="Address" value="{{$company->Mailing_Address}}" class="form-control" placeholder="Address">
          </div>
        </div>






        <button type="submit" class="btn btn-primary">
         Update
        </button>
    </div>
</form>


@endsection
