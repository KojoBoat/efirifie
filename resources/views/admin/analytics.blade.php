@extends ('layouts.admin')

@section('body')


   <div class="table-responsive">
     <h1>General Information </h1>

    <h3>Number of items sold:{{$orders}} </h3>
     <br>
     <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>item_name</th>
            <th>item_price</th>
        </tr>
        </thead>
        <tbody>
      @foreach($order_items as $order_item)
         <tr>
         <td>{{$order_item->id}}</td>
         <td>{{$order_item->item_name}}</td>
         <td>{{$order_item->item_price}}</td>
         </tr>
      @endforeach
      </tbody>
     </table> 

@endsection