@extends('site.layout')
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-th-list"></i> Members</h1>
		<p>Table to display analytical data effectively</p>
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item active"><a href="#">Members</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="" style="padding:20px 0;">
				<button class="btn btn-primary" type="button" onclick="location.href='{{ url('/') }}/Member/create'"><i class="fa fa-plus" ></i> Add</button>
			</div>
			<div class="tile-body">
				<table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($members as $member)
						<tr>
							<td>{{ $member->firstname.' '.$member->lastname }}</td>
							<td>{{ $member->position }}</td>
							<td>{{ $member->office }}</td>
							<td>{{ $member->age }}</td>
							<td>{{ date_format( date_create($member->start_date),"d/m/Y") }}</td>
							<td>{{ number_format($member->salary) }}</td>
							<td>
								<div class="block-i-opt">
									<i class="fa fa-edit font-opt mar-r-5"></i>
									<i class="fa fa-trash font-opt"></i>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<!-- Data table plugin-->
<script type="text/javascript" src="{{URL::asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>
</html>
@stop
