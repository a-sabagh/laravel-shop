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

Route::get('/', function (Illuminate\Http\Request $Request) {
    $Request->session()->put('prefix','gnutec');
    $Request->session()->put('name','abolfazl');
    $title = "Start Laravel Learning";
    return view('welcome',compact('title'));
})->name('home');
Route::get("about-us/{author?}","aboutPage@index" )->name('about.us');
Route::get('shop/', 'ProductController@archive')->name('product.list');
Route::get('admin/', 'ProductController@dashboard')->name('dashboard');
Route::get('admin/new-product/','ProductController@newProduct')->name('new.product');
Route::post('admin/','ProductController@saveProduct')->name('save.product');
Route::get('product/{id}','ProductController@single');
// Route::get('test/{variable}', function (Illuminate\Http\Request $Request,$variable) {
//     dd($Request);
// });
// Route::get('/product/{id}', function ($id) {
//     return $id;
// });
// Route::get('product/{id}', function($id){
//     $title = "Product";
//     return view("product",compact("id","title"));
// });
// Route::get('id/{id}/title/{title}', function ($id,$title) {
//     return "ID: " . $id . " title: " . $title;
// });
Route::get('/home','HomeController@index');
Auth::routes();
// Route::get('/products-ordered', function () {
//     $products = DB::table('products')->orderBy('name','asc')->get();
//     dd($products);
// });
Route::get('setsession',function(Illuminate\Http\Request $request){
    $request->session()->put('firstName','Paul Pogba');
    $title = "after set session";
    return view('welcome',compact('title'));
});
Route::get('getsession',function(Illuminate\Http\Request $request){
    $session_methods = get_class_methods($request->session());
    $session_id = $request->session()->getId();
    $session_contnet = $request->session()->get('firstName');
    dd($session_contnet);
});