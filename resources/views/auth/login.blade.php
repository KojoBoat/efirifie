 
@extends('layouts.index') 

@section ('center') 

<div id="home" >
	<!-- container -->
	
	<div class="section" style="margin-left:55px; margin-bottom:100px;">

		<div class="container">
		<!-- home wrap -->

		<div class="row">
 			<div class="col-md-12">

				<div class="home-wrap">
						@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
					<!-- <div class="container"> -->
					<div class="login-form">
						<div class="form-group">
							<form action="{{url('/login')}}" method="POST">
							@csrf
								<div class="form-group">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="remember-checkbox">
									<label class="form-check-label" for="remember me">Remember me</label>
								</div>
								<button type="submit" class="btn btn-primary">Login</button><br> <br> <p><a href=""> Forgot password?</a></p>
							</form>
						</div>
					</div>
					<!-- </div> -->

				</div>
 
			</div>
		</div>

	</div>

	</div>

</div>
@endsection



