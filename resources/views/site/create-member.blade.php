@extends('site.layout')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-edit"></i> Create Members</h1>
		<p>Fill in the information below.</p>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="{{url('/')}}/Member">Members</a></li>
		<li class="breadcrumb-item">Create</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<form id="form-create">
						@csrf
						<div class="form-group">
							<label>Firstname</label>
							<input class="form-control" id="firstname" type="text" placeholder="Firstname" required>
							<!-- <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small> -->
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Lastname</label>
							<input class="form-control" id="lastname" type="text" placeholder="Lastname" required>
						</div>
						<div class="form-group">
							<label >Position</label>
							<select class="form-control" id="position" required>
								<option value="">Select Position</option>
								<option value="Manager">Manager</option>
								<option value="Programmer">Programmer</option>
								<option value="tester">Tester</option>
								<option value="Project">Project Manager</option>
								<option value="Sale">Sale</option>
								<option value="Accountant">Accountant</option>
							</select>
						</div>
						<div class="form-group">
							<label >Office</label>
							<select class="form-control" id="office" required>
								<option value="">Select Office</option>
								<option value="Thailand">Thailand</option>
								<option value="Tokyo">Tokyo</option>
								<option value="London">London</option>
								<option value="San Francisco">San Francisco</option>
								<option value="New York">New York</option>
								<option value="Edinburgh">Edinburgh</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Age</label>
							<input class="form-control" id="age" type="number" placeholder="Age" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Start Date</label>
							<input class="form-control" id="start_date" type="date" data-date="" data-date-format="DD MMMM YYYY" required>
						</div>
						<div class="form-group">
							<label class="control-label">Salary</label>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text">฿</span></div>
									<input class="form-control" id="salary" type="number" placeholder="Amount" required>
									<div class="input-group-append"><span class="input-group-text">.00</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tile-footer center">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{ URL::asset('js/plugins/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/plugins/sweetalert.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ URL::asset('js/member-create.js') }}"></script> -->
<script>
$('#demoNotify').click(function() {
	$.notify({
		title: "Update Complete : ",
		message: "Something cool is just updated!",
		icon: 'fa fa-check'
	}, {
		type: "info"
	});
});

$('#form-create').submit(function(event) {
	event.preventDefault();
	swal({
		title: "Are you sure?",
		text: "You will create new member!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, do it.",
		cancelButtonText: "No, cancel.",
		closeOnConfirm: false,
		closeOnCancel: false
	}, function(isConfirm) {
		if (isConfirm) {
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var position = $('#position').val();
			var office = $('#office').val();
			var salary = $('#salary').val();
			var start_date = $('#start_date').val();
			var age = $('#age').val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			var request;
			if (request) {
				request.abort();
			}

			request = $.ajax({
				url: '{{url('/')}}/Member',
				method:'POST',
				contentType: "application/json",
				dataType: "json",
				data: JSON.stringify({
					firstname: firstname,
					lastname: lastname,
					position: position,
					office: office,
					start_date: start_date,
					salary: salary,
					age: age
				}),
				success: function(response){
				},
				error: function(response){
					console.log('Status Code: '+response.status);
					if(response.status==200) {
						clear();
						swal("Created Successfully!", "You have created a new member.", "success");
					} else {
						swal("Created Fail!", "Please check input and try again.", "error");
					}
				}
			});
		} else {
			swal("Cancelled", "You have cancelled.", "error");
		}
	});
});

function clear() {
	$('#form-create')[0].reset();
}

</script>

</body>
</html>
@stop
