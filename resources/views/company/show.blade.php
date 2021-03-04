@extends('layouts.app')
@section('content')



<section class="content">
	<div class="container-fluid">
		<div class="row">
			 
		 </br>
			<div class="col-md-8"><h3>Company Info</h3></br>
				<img class="img-circle elevation-2" src="{{ asset('storage/'.$company->logo)}}" alt="User Avatar">
				<hr>
				<strong><i class="fas fa-envelope mr-1"></i> Name</strong>
				<p class="text-muted">{{$company->name}}</p>
				<hr>
				<strong><i class="fas fa-envelope mr-1"></i> Email</strong>
				<p class="text-muted">{{$company->email}}</p>
				<hr>
				<strong><i class="fas fa-phone mr-1"></i> Website</strong>
				<p class="text-muted">{{$company->website}}</p>
				<hr>


			</div>
		</div>
	</div>

</section>
@endsection