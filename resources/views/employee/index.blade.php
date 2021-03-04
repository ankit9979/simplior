@extends('layouts.app')
@section('content')

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Employees</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('employees.create')}}">Add Employee</a></li>

				</ol>
			</div>
		</div>
	</div>
	<div class="card-body">
		@if (session('success'))
		<div class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
		@endif
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->

				<div class="card">
					<div class="card-body table-responsive p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if(!$employees->isEmpty())
								@foreach ($employees as $employee)
								<tr>
									<td>{{ $employee->first_name." ". $employee->last_name }}</td>
									<td>{{ $employee->email }}</td>
									<td>{{ $employee->phone }}</td>
									<td><a href="{{route('employees.show', $employee->id)}}" class="btn btn-info">View</a>
										<a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a>
										<form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
											@csrf
											@method('DELETE')
											<button type="button" onclick="deleteConfirmation(this.form)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="4">No Data</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
				
				{{ $employees->appends(Request::all())->links() }}
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>
@endsection
<script type="text/javascript">
	function deleteConfirmation(e){
		event.preventDefault(e);
		var formData = e;
		if (confirm('Are you sure?')) {
			formData.submit();
		}
	}
</script> 