<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentsController extends Controller
{

       public function __construct(){
           $this->middleware('auth');
       }
    //
    public function showPaymentPage(){
        $cart = Session::get('cart');
          // return $cart;
          if($cart != null) {//if there is something in the cart
        return view('payment.payment');
          }
        else { 
        return redirect()->route('home');
          // return 'err';
                }        // return 'errr';
    }

      public function makePayment(Request $request){
        // $cart = Session::get('cart');
        //   $cart = Session('cart');
        // return $cart;
        $network =$request['network'];
        //$item_price = $cart['data']['price'];
        $sender = $request['mobilenumber'];

        
        $url = 'https://client.teamcyst.com/api_call.php';
            $additional_headers = array(
            'Content-Type: application/json'
            );

            $data = array(
            "price"=> '500',
            "network"=> $network,  //sender's network
            "recipient_number"=> "0240965265",
            "sender"=> $sender,
            "option"=> "rmta", //option
            "apikey"=> "887eeba9dbae62158a1806555151c56fae0ba6da"
            );
            $data = json_encode($data);
            

            $ch = curl_init($url);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // $data is the request payload in JSON format                                                                 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers); 

            $server_output = curl_exec ($ch);
      }
}
