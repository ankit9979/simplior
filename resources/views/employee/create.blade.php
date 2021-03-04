@extends('layouts.app')
@section('content')
<div class="card-body">
	@if (session('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
	</div>
	@endif

</div>
<h3>Add Employee</h3>
<section class="content">
	<form method="POST" action="{{ route('employees.store') }}" id="organisatieform" class="col-sm-6 p-0" enctype="multipart/form-data" autocomplete="off">
		@csrf
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control required @error('first_name') is-invalid @enderror"   value="{{ old('first_name') }}"  autocomplete="off" >
			<span class="text-danger">{{$errors->first('first_name')}}</span>
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control required @error('last_name') is-invalid @enderror"   value="{{ old('last_name') }}"  autocomplete="off" >
			<span class="text-danger">{{$errors->first('last_name')}}</span>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control required @error('email') is-invalid @enderror"   value="{{ old('email') }}"  autocomplete="off">
			<span class="text-danger">{{$errors->first('email')}}</span>
		</div>

		<div class="form-group">
			<label>Company</label>
			<select name="company_id" class="form-control required @error('company_id') is-invalid @enderror">
					<option value=""> Select </option>
				@foreach($companies as $company)
				<option value="{{ $company->id }}">{{ $company->name }}</option>
				@endforeach
			</select>
			<span class="text-danger">{{$errors->first('company_id')}}</span>
		</div>

		<div class="form-group">
			<label>Phone</label>
			<input type="text" name="phone" class="form-control number required @error('phone') is-invalid @enderror"   value="{{ old('phone') }}"  autocomplete="off" >
			<span class="text-danger">{{$errors->first('phone')}}</span>
		</div>




		<div class="form-action-btn">
			<button type="submit" class="btn btn-primary">
				Save
			</button>
		</div>
	</form>
</section>
@endsection