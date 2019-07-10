<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\User;
use App\Order;
use App\Orderitem;


class AdminProductsController extends Controller
{
    //displaying the products
    public function index(){
        $products = Product::paginate(2); //show 2 products per page
    	return view('admin.displayProducts', ['products'=> $products]);
    }


        //displaying the editing forms 

    public function editProductForm($id){
        $product = Product::find($id);
        return view('admin.EditProductForm',['product'=>$product]);
        

    }


    public function editProductImageForm($id){
        $product = Product::find($id);
        return view('admin.EditProductImageForm',['product'=>$product]);

    }

       //function to update the product image
    public function updateProductImage(Request $request,$id){
      
        //   making sure that an image is uploaded, validating the incoming request
        Validator::make($request->all(),['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000000"])->validate();

               //Checking if the file exists in the public storage folder
        if($request->hasFile('image')){
            $product = Product::find($id);
            $exists = Storage::disk('local')->exists("public/products_images/".$product->image);

        //deleting the old image
        if($exists){
            Storage::delete('public/product_images/'.$product->image);
        }

        //uploading a new image
        $ext = $request->file('image')->getClientOriginalExtension(); //getting the image extensions

        $request->image->storeAs("public/product_images/",$product->image); //storing the new image in the product_image folder

        $arrayToUpdate = array("image" => $product->image);
        DB::table('products')->where('id',$id)->update($arrayToUpdate);

          return redirect()->route("adminDisplayProducts"); 

        }else {
      
             $error = "No image was selected";
             return $error;
             
        }

    }

     //We update the product details here
    public function updateProduct(Request $request,$id){

        $name = $request['name'];
        $description = $request['description'];
        $type = $request['type'];
        $price = $request['price'];

        Validator::make($request->all(),
        ['name'=> "required",'description' => "required",'type' =>"required", 'price' => "numeric|required"])->validate();

        $arraytoUpdate = array("name" => $name, "description" => $description, "type" => $type, "price" => $price);
        DB::table('products')->where('id',$id)->update($arraytoUpdate);

        return redirect()->route("adminDisplayProducts");
        // echo $name,$description;
    }

    public function createNewProductForm(){
        return view('admin.createNewProduct');
    }

      //creating the new product
    public function insertNewProduct(Request $request){
        $name = $request['name'];
        $description = $request['description'];
        $type = $request['type'];
        $price = $request['price'];

        Validator::make($request->all(),['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000000"])->validate();
        $ext = $request->file('image')->getClientOriginalExtension();

        //replacing any spaces in the image
        $stringImageReFormat = str_replace(" ","",$request['name']);

        //imageName
        $imageName = $stringImageReFormat.".".$ext;
        $imageEncoded = File::get($request->image);  //getting the encoded form of the image    
        Storage::disk('local')->put('product_images/'.$imageName, $imageEncoded); //the directory of the image

        $arrayToInsert = array("name" => $name, "description" => $description, "image" =>$imageName, "type" =>$type, "price" => $price);
        // $id = DB::table('users')->insertGetId($arrayToInsert);
        $created = DB::table('products')->insert($arrayToInsert);

        if($created){
           return redirect()->route('adminDisplayProducts');
        }else {
             return "Product was not created";
        }
    }


      // delete an item from from the dashboard
    public function deleteProduct(Request $request,$id){
        $product = Product::find($id);
        $exists = Storage::disk('local')->exists("public/products_images/".$product->image);

        //deleting the old image
        if($exists){
            Storage::delete('public/product_images/'.$product->image);
        }

        Product::destroy($id);

        return redirect()->route('adminDisplayProducts');
    }

    public function showOwners(Request $request){
         $users = User::all()->count();
         $user_details = User::all();
          return view('admin.users', compact("users","user_details"));

    }

    public function displayInfo(Request $request){
        $orders = Orderitem::all()->count();
        $order_items = Orderitem::all();

        return view('admin.analytics',compact("orders","order_items"));
    }
}
