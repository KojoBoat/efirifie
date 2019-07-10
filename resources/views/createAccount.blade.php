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
                            <!-- <div class="container"> -->
                            <div class="login-form">
                                <div class="form-group">
                                
                                    <form action="#" method="POST">
                                    @csrf
                                       <h1>Create an account<hr></h1>
                                        <div class="form-group">
                                            <label for="FirstName">Full Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" placeholder="Enter firstname" required>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="shop">Shop Name</label>
                                            <input type="text" class="form-control" id="shopname" name="shopname" placeholder="Shop Name" required>
                                        </div>
                                        <div class="form-group purple-border">
                                             <label for="Shop Description">Shop Description</label>
                                            <textarea class="form-control" id="shop_desc" rows="3" name="description"></textarea>
                                            
                                            </div>
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                     <div class="form-group">
                                       <label for="number">Telephone</label>
                                       <input type="number" class="form-control" id="number" name="telephone" placeholder="Enter your number here" required>
                                     </div>
                                      <div class="form-group">
                                        <label for="Region">Select your region</label>
                                        <select class="form-control"name="region">
                                        <option selected>Central</option>
                                        <option value="1">Greater Accra</option>
                                        <option value="2">Upper East</option>
                                        <option value="3">Upper West</option>
                                        <option value="4">Eastern</option>
                                        <option value="5">Western</option>
                                        <option value="6">Volta</option>
                                        <option value="7">Northern</option>
                                        <option value="8">Ashanti</option>
                                        <option value="9">Brong Ahafo</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>

                                <div class="form-group">
									<label for="confirm-password">Confirm Password</label>
									<input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Enter Password again">
								</div>
                                        <button type="submit" class="btn btn-primary">Create</button>
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