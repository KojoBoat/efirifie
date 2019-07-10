	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::post('register_user',function(){
//   return "successful";
// });



Route::get('home/createaccount', 'ProductsController@createAccount');
Route::get('/joinus', 'ProductsController@joinus');
Route::get('/login', 'ProductsController@login');


//User authentication
Auth::routes();
// Route::get('/home', 'Product')
Route::get('/home','ProductsController@index');
Route::get('/', ['uses'=>'ProductsController@index', 'as' => 'home']);
Route::post('/login', 'LoginController@login_user');
Route::get('/logout', 'LoginController@logout');
Route::get('/home/addToCart/{id}', ['uses'=>'ProductsController@addProductToCart', 'as'=>'AddToCartProduct']);
Route::post('/register_user', 'ProductsController@register_user');
Route::get('cart', ['uses'=>'ProductsController@showCart', 'as'=>'cartproducts']);
Route::get('/home/deleteItemFromCart/{id}', ['uses' => 'ProductsController@deletefromCart', 'as'=>'DeletefromCart']);

//search
Route::get('/search', ['uses' => 'ProductsController@search', 'as'=>'searchProduct']);

//show profile
Route::get('/profile', 'ProductsController@showProfile');



//Admin Panel 
Route::get('admin/products', ['uses'=>'Admin\AdminProductsController@index', 'as'=>'adminDisplayProducts'])->middleware('restrictToAdmin');

//Display edit product form
Route::get('admin/editProductForm/{id}', ['uses' => 'Admin\AdminProductsController@editProductForm', 'as' => 'admineditProduct']);

//display the edit image product form
Route::get('admin/editProductImageForm/{id}', ['uses' => 'Admin\AdminProductsController@editProductImageForm', 'as' => 'admineditProductImage']);

//route to the function to update the image
Route::post('admin/updateProductImage/{id}',['uses' => 'Admin\AdminProductsController@updateProductImage', 'as'=>'adminUpdateProductImage']);

//route to the function to update the products details
Route::post('admin/updateProduct/{id}', ['uses'=> 'Admin\AdminProductsController@updateProduct', 'as' => 'adminUpdateProduct']);

//create a new product form
Route::get('admin/createNewProductForm', ['uses'=> 'Admin\AdminProductsController@createNewProductForm', 'as' => 'createNewProduct']);


//sendng the product into the database
Route::post('admin/insertNewProduct', ['uses' => 'Admin\AdminProductsController@insertNewProduct', 'as' => 'insertProduct']);

//route to delete item in the dashboard
Route::get('admin/deleteProduct/{id}', ['uses' => 'Admin\AdminProductsController@deleteProduct', 'as' => 'adminDeleteProduct']);


//creating an order
Route::post('cart/checkoutProducts/placeOrder', 'ProductsController@createNewOrder')->name('checkout');

Route::get('cart/checkoutProducts',['uses'=>'ProductsController@checkoutProducts','as'=>'checkoutProducts']);


Route::get('admin/shopowners', ['uses' => 'Admin\AdminProductsController@showOwners', 'as' => 'shopowners']);

Route::get('admin/displayinfo', ['uses' => 'Admin\AdminProductsController@displayInfo', 'as' => 'displayinfo']);

//Showing the payment page
Route::get('payment/paymentPage', ['uses' => 'PaymentsController@showPaymentPage', 'as' =>'showPaymentPage']);

Route::post('payment/paymentPage/Pay', ['uses' => 'PaymentsController@makePayment', 'as' => 'makepayment']);


