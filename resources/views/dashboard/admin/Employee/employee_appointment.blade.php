@extends("layouts.layout")

@section("main")


		@if (session('Appointment'))
					<div class="alert alert-success">
					  {{ session('Appointment') }}
				  </div>
				  @endif
	<button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#modal-fill">
		Add Appointment
	  </button>

	  
	
	<div id="calendar">
	
	</div>

</section>
</div>
</div>
<div class="modal modal-fill fade" data-backdrop="false" id="modal-fill" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">

		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body " >
			<form action="{{ route('admin_create_appointments', ['id' => $employees->id]) }}" method="post" class="form h-24">
				@csrf
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			
				<div class="box-body">
					<h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i>Appointment Info</h4>
					<hr class="my-15">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">First Name</label>
								<input type="text" name="Name" class="form-control" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Last Name</label>
								<input type="text" name="lName" class="form-control" placeholder="Last Name" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div clform-group">
								<label class="form-label">Email</label>
								<input type="email" name="Email" class="form-control" placeholder="Email" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Gender</label>
								<select name="gender" class="form-control" required>
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="other">Other</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="form-label">Address</label>
							<input type="text" name="Address" class="form-control" placeholder="Address" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Quote number</label>
								<input type="number" name="Quote_number" class="form-control" placeholder="Quote number" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Contact Number</label>
								<input name="Phone_number" type="number" class="form-control" placeholder="Phone" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Start Time</label>
								<input type="datetime-local" name="start_time" class="form-control" placeholder="time" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">End Time</label>
								<input type="datetime-local" name="finish_time" class="form-control" placeholder="time" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Note</label>
								<textarea name="comments" class="form-control w-500" id="" cols="30" rows="8" required></textarea>
							</div>
						</div>
					</div>
				</div>
			
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">
						<i class="ti-save-alt"></i> Save
					</button>
				</div>
			</form>
			
		</div>

	  </div>
	</div>
</div>
</div>
</div>

<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Client Appointment</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<table id="mainTable" class="table editable-table table-bordered mb-0">
					<tbody>
						<tr>
							<th>Client Id</th>
							<td id="Client_id" class=""></td>
						</tr>
						<tr>
							<th>Client Name</th>
							<td id="Client_name" class="editable "></td>
						</tr>
						<tr>
							<th>Appointment Start</th>
							<td id="start_time" class="editable " data-input-type="datetime-local"></td>
						</tr>
						<tr>
							<th>Appointment End</th>
							<td id="end_time" class="editable " data-input-type="datetime-local"></td>
						</tr>
						<tr>
							<th>Client Comment</th>
							<td id="client_Comments" class="editable "></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal-footer modal-footer-uniform">
		  <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		  <a type="button" class="btn btn-danger float-end delete-appointment">Delete</a>

		<button type="button"  class="btn btn-primary float-end submit-form">Update</button>
		</div>
	  </div>
	</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
 const editableCells = document.querySelectorAll('.editable');
        
        editableCells.forEach((cell) => {
            cell.addEventListener('click', () => {
              
                if (!cell.classList.contains('editing')) {
                    cell.classList.add('editing');
                    const text = cell.innerText;

					if (cell.dataset.inputType) {
    if (cell.dataset.inputType === 'datetime-local') {
        cell.innerHTML = '<input class="form-control" type="datetime-local" value="' + text + '" required>';
    } else {
        cell.innerHTML = '<input type="text" class="form-control" value="' + text + '">';
    }
} else {
    cell.innerHTML = '<input type="text" class="form-control" value="' + text + '">';
}


const inputElement = cell.querySelector('input');
if (inputElement.value.trim() === '') {

    inputElement.classList.add('error');
} else {
  
    inputElement.classList.remove('error');
}


                    const input = cell.querySelector('input');
                    input.focus();

                  
                    input.addEventListener('blur', () => {
                        cell.classList.remove('editing');
                        cell.innerText = input.value;
                    });

                    input.addEventListener('keyup', (e) => {
                        if (e.key === 'Enter') {
                            cell.classList.remove('editing');
                            cell.innerText = input.value;
                        }
                    });
                }
            });
        });
		$(document).ready(function() {
    $('.submit-form').click(function() {
       
        var data = {
            id: $('#Client_id').text() , 
            Name: $('#Client_name').text(),
            start_time: $('#start_time').text(),
            finish_time: $('#end_time').text(),
            comments: $('#client_Comments').text(),
        };
console.log(data);
        
        $.ajax({
            method: 'POST',
            url: "{{ route('update.data') }}",
			headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
            data: data,
            success: function(response) {
               
				swal("Appointment Update Successfully");
            },
            error: function(response) {
                
				swal("Appointment updation failed");

            }
        });
    });
});
$(document).ready(function () {
    $('.delete-appointment').on('click', function () {
       
        var appointmentId = $('#Client_id').text(); 

		console.log(appointmentId);
        $.ajax({
            type: 'POST',
            url: '/delete-appointment/' + appointmentId,
            data: {
                "_token": "{{ csrf_token() }}", 
            },
            success: function (data) {
                
                $('#modal-center').modal('hide');
               
            },
           
        });
    });
});

</script>

	 
	@push('scripts')

	
		<script>
			
		document.addEventListener('DOMContentLoaded', function () {
			var calendarEl = document.getElementById('calendar');
			var event= @json($events)	
			
			var mymodal =document.getElementById("asd")


			var calendar = new FullCalendar.Calendar(calendarEl, {
				slotMinTime: '00:00:00',
				slotMaxTime: '24:00:00',
				events:event ,
				selectable: true,
				initialView: 'dayGridMonth',
				timeZone: 'UTC',
    			eventColor: '#36454F',
				headerToolbar: {
      			left: 'prev,next today,multiMonthYear',
      			center: 'title',
				
      			right: 'dayGridMonth,timeGridWeek,timeGridDay',
	  			prev: 'fa-chevron-left',
 				next: 'fa-chevron-right',
    },			
	eventClick: function(info) {
		var id = document.getElementById("Client_id");
			id.innerHTML = info.event.id;
		var name = document.getElementById("Client_name");
			name.innerHTML = info.event.title;
		var start = document.getElementById("start_time");
			start.innerHTML = info.event.start;
		var end = document.getElementById("end_time");
			end.innerHTML = info.event.end;
		var comments = document.getElementById("client_Comments");
			comments.innerHTML = info.event._def.extendedProps.comments;



		var myModal = new bootstrap.Modal(document.getElementById("modal-center"));
		myModal.show();
		

  },
  dateClick: function(info) {
   
    var myModal1 = new bootstrap.Modal(document.getElementById("modal-fill"));
		myModal1.show() ;

   
  },
				
				


			});
			
			calendar.render();
		});
	</script>
	@endpush




	@endsection
