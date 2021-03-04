@extends('layouts.app')
@section('content')
<div class="card-body">
	@if (session('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
	</div>
	@endif
</div>
<h3>Edit Compnay</h3>
<section class="content">
	<form method="POST" action="{{ route('companies.update',$company->id) }}" id="organisatieform" class="col-sm-6 p-0" enctype="multipart/form-data" autocomplete="off">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control required @error('name') is-invalid @enderror"   value="{{  $company->name }}"  autocomplete="off" >
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control required @error('email') is-invalid @enderror"   value="{{  $company->email }}"  autocomplete="off">
			<span class="text-danger">{{$errors->first('email')}}</span>
		</div>
		<div class="form-group">
			<label> Logo</label>
			<img class="img-circle elevation-2" src="{{ asset('storage/'.$company->logo)}}" alt="User Avatar">
			<input type="file" id="logo" name="logo" class="required form-control">
			<span class="text-danger">{{$errors->first('logo')}}</span>
		</div>

		<div class="form-group">
			<label>Website</label>
			<input type="text" name="website" class="form-control number required @error('website') is-invalid @enderror" id="web" value="{{  $company->website }}"  autocomplete="off" >
			<span class="text-danger">{{$errors->first('website')}}</span>
		</div>




		<div class="form-action-btn">
			<button type="submit" class="btn btn-primary">
				Save
			</button>
		</div>
	</form>
</section>
@endsection