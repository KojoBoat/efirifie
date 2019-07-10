@extends('layouts.index')

@section('center')

<div id="home" >
            <!-- container -->
            
            <div class="section" style="margin-left:55px; margin-bottom:100px;">

                <div class="container">
                <!-- home wrap -->
               
                    <div class="row">
                       <div class="col-md-12">
                            
                         <div class="home-wrap">
                            <!-- <div class="container"> -->
                            @if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
                            <div class="login-form">
                                <div class="form-group">
                                  
                                    <form action="{{url('register_user')}}" method="POST">
                                    @csrf
                                       <h1>Join Us<hr></h1>
                                       <p style="font-size:15pt;">Smarter Shopping Better Living! Choose from over many different categories 
                                       with hundreds of products.</p>
                                       <div class="form-group">
                                            <label for="FullName" style="font-size:15pt;">Fullname</label>
                                            <input type="text" class="form-control" id="username" name="name" aria-describedby="emailHelp" placeholder="Fullname" required>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                                        </div>

                                         <div class="form-group">
                                            <label for="Email address" style="font-size:15pt;">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address" required>
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small> -->
                                        </div>

                                        <div class="form-group">
									<label for="password" style="font-size:15pt;">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password"><br>
                                     <p style="font-size:15pt;">Your personal data will be used to support your experience throughout this website, 
                                     to manage access to your account, and for other purposes described in our privacy policy.</p>
                                     <button type="submit" class="btn btn-primary" name="joinus">Join Us</button>
                            	</div>
                                </form>
                            </div>                 
                         </div>      
                   </div>
               </div>
            </div>
        </div>
        
    </div>
    
    </div>



@endsection