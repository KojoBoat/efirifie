<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items; // this will contain the details of an item
                   // ['id' => ['quantity'=>, 'price'=>, 'data' =>],..]
    public $totalQuantity;
    public $totalPrice;
    /**
     * Cart constructor
     */
    public function __construct($prevCart){
      //checking if there's an item already in the cart
       if($prevCart != null){
          $this->items = $prevCart->items;
          $this->totalQuantity = $prevCart->totalQuantity;
          $this->totalPrice = $prevCart->totalPrice;
       }else {
            //when the user is adding an item to the cart for the first time
        $this->items =[];
          $this->totalQuantity = 0;
          $this->totalPrice = 0;
       }
    }

       public function addItem($id,$product){
           //converting the price back to an integer
           $price =(int) str_replace('Ghs'," ",$product->price);
            //checking if the item already exists
            $productToAdd = "";
           if(array_key_exists($id, $this->items)){
           $productToAdd = $this->items[$id];
           $productToAdd['quantity']++;
           $productToAdd['totalSinglePrice'] =  $productToAdd['quantity'] * $price; 

           } else{

               $productToAdd=['quantity'=>1, 'totalSinglePrice'=> $price, 'data'=>$product];
              
           }

           
           $this->items[$id] = $productToAdd;
           $this->totalQuantity++;
           $this->totalPrice = $this->totalPrice + $price;
       }

         //function to update quantity and price after deleting from cart
       public function updatedQuantityAndPrice(){
          $totalPrice =0;
          $totalQuantity = 0;

           //looping through the items array to update the price and quantity
          foreach($this->items as $item) {
            $totalQuantity = $totalQuantity + $item['quantity'];
            $totalPrice    = $totalPrice  + $item['totalSinglePrice'];

          }

          $this->totalPrice = $totalPrice;
          $this->totalQuantity = $totalQuantity; 
       }

    }

