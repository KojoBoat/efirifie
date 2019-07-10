<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\validator;

// use Request;
use App\User;
// use Session;
use App\Cart;
use App\Product;
use Carbon\Carbon;
use App\OrderItem;
use App\Order;

class ProductsController extends Controller
{

    public function __construct() {
        //redirects users who try to add products to cart who aren't logged in
        $this->middleware('auth', ['only' => ['addProductToCart']]);
    }

    public function index(){
    	$products = Product::all();
    	return view('home', compact( "products"));
    }

    public function login(){
    	return view('login');
    }

    public function createAccount(){
        return view('createAccount');
    }

        //showing the user profile
      public function showProfile(){
          return view('profile');
      }

    public function joinus(){
        return view('joinus');
    }

     public function search(Request $request){
         $searchtext = $request->get('searchtext');  //getting the search value 
         $products = Product::where('name','like',$searchtext."%")->Paginate(3);
         return view('home',compact('products'));
           
     }


        //placing the order
     public function createNewOrder(Request $request){
        //  return $request->all();
        $cart = Session::get('cart');
        $date = Carbon::today()->toDateString(); //getting the current date and time         
        $messages =['email.required'=> 'Email is required','zip.required' =>'Zip code should be of 5 digits','first-name.required'=>'Name field is required','last-name.required'=>'Enter lastname'];
        $this->validate($request, [
          'email' => 'required|unique:users|email',
          'first-name' => 'required|alpha',
          'last-name' => 'required|alpha',
          'address' => 'required',
          
    
        ],$messages);
        //cart is not empty
        if($cart) {
        // dump($cart);
            $order = Order::create([
                'status' => 'on_hold',
                'date' => $date,
                'del_date' => $date,
                'price' => $cart->totalPrice,
                'first-name' => $request['first-name'],
                'last-name' => $request['last-name'],
                'address' => $request['address'],
                'email' => $request['email'],
                'zip' => $request['zip-code'],
                'del' => $request['tel'],
            ]);

      
            foreach($cart->items as $cart_item){
           
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];

                $orderItem = OrderItem::create([
                    'item_id' => $item_id,
                    'order_id' => $order->id,
                    'item_name' => $item_name,
                    'item_price' => $item_price,
                ]);
              
        
            }

            //delete cart
            // Session::forget("cart");
            $request->session()->keep(['id', 'name','price']);
            return redirect()->route("showPaymentPage");
            // dump($order);

        }else{

            return redirect()->route("home");
            // return 'error';

        }


    }

    //checkout products
    public function checkoutProducts(){
      return view('checkout');
    }

   

        //insert a user into the database when he registers
    public function register_user(Request $request){

        $messages =['email.required'=> 'Email is required','password.required' =>'Password is required'];
        $this->validate($request, [
          'email' => 'required|unique:users|email',
          'password' => 'required|alpha_num',
          'name' => 'required',
        ],$messages);
        // if ($validator->fails()) {
        //     return redirect('/joinus')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
        //   $user = new User;
        //   $input = $request->all();
          
        //   $user->name = $request->input('name');
        //   $user->email = $request->input('email');
        //   $user->password = Hash::make($request->input('password'));
          
        // //   $hashed = Hash::make('password');
        // //   $user->password = $hashed;
        //   $user->save();
          return redirect('/login');
         
          
 }

   public function addProductToCart(Request $request, $id){
      //session data or retrieving previous data
      $prevCart = Session::get('cart');
      $cart = new Cart($prevCart);

      $product = Product::find($id);
      $cart->addItem($id,$product);
      session(['cart' => $cart]);
    //   session()->put('cart',$cart);

    //   dump($cart);
    // return response()->json($cart->items);
    return redirect('/');

   }

   public function showCart(){
       $cart = Session::get('cart');

       //if cart is not empty
       if($cart){
           //show the items in the cart
         return view('cartpage',['cartItems' => $cart]);
        

       }else{
           return redirect('home');
       }
   }

   public function deletefromCart(Request $request,$id){
       //creating the cart session
       $cart = Session::get('cart');
         
    //Checking if item is in cart
    if(array_key_exists($id,$cart->items)){
       unset($cart->items[$id]);
    }
     
    //determine the new number of items(quantity) left,total price..using a new instance of the cart
    $prevCart = Session::get('cart');
    
    //creating the new object of the cart
    $updatedCart = new Cart($prevCart);

    //function for calculating the quanity and price
    $updatedCart->updatedQuantityAndPrice();

    Session()->put("cart", $updatedCart);

    return redirect()->route('cartproducts');

   }

   
}

