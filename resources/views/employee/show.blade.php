@extends('layouts.app')
@section('content')



<section class="content">
	<div class="container-fluid">
		<div class="row">
			 
		 </br>
			<div class="col-md-8"><h3>Employee Info</h3></br>
				 
				<strong><i class="fas fa-envelope mr-1"></i> Name</strong>
				<p class="text-muted">{{$employee->first_name." ".$employee->last_name}}</p>
				<hr>
				<strong><i class="fas fa-envelope mr-1"></i> Company Name</strong>
				<p class="text-muted">{{$employee->first_name." ".$employee->company->name}}</p>
				<hr>
				<strong><i class="fas fa-envelope mr-1"></i> Email</strong>
				<p class="text-muted">{{$employee->email}}</p>
				<hr>
				<strong><i class="fas fa-phone mr-1"></i> Phone</strong>
				<p class="text-muted">{{$employee->phone}}</p>
				<hr>


			</div>
		</div>
	</div>

</section>
@endsection