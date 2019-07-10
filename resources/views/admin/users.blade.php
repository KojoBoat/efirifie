@extends ('layouts.admin')

@section('body')


   <div class="table-responsive">
     <h1>General Information </h1>
    <br>
       <h5 class="btn btn-success">Number of shop owners:{{$users}}</h5> 
           
           <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>

           @foreach($user_details as $user_detail)
            <tr>
              <td>{{$user_detail->name}}</td>
              <td>{{$user_detail->email}}</td>
            </tr>
    
          <br>
           @endforeach
         </tbody>
         </table>
   </div>

@endsection