<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeProduct;
use App\Events\ProductCreated;
use App\products;
use App\category;

class ProductController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('auth')->only(['dashboard','newProduct','saveProduct']);
        $this->middleware('auth')->except(['archive','single']);
    }

    public function dashboard()
    {
        $title = "Admin Panel";
        return view('dashboard',compact('title'));
    }

public function archive()
{
    $products = products::with('user')->orderBy('name','asc')->get();
    $title = "Product List";
    return view('archive-product',compact('products','title'));
}

    public function single($id)
    {
        $product = products::with('categories')->findOrFail($id);
        $title = $product->name;
        return view('single-product',compact('product','title'));
        // if(!empty($product)){
        //     $title = $product->name;
        //     return view('single-product',compact('product','title'));
        // }else{
        //     abort(404);
        // }
        
    }

    public function newProduct()
    {
        $title = "Add New Product";
        $categories = category::all();
        return view('new-product',compact('title','categories'));
    }

    public function saveProduct(storeProduct $request)
    {
        $user = Auth::user();
        $request->validated();
        $product_params = $request->except(['_token','category_id']);
        $product_params['status'] = 1;
        $product = $user->products()->create($product_params);
        $product->categories()->attach($request->get('category_id'));
        
        event(new ProductCreated($product,$user));
        /*
        //send mail
        Mail::to(Auth::user())->send(new ProductCreated($product,Auth::user()));
        //send sms
        $sms = new KavenegarApi(env('KAVENEGAR_API_KEY'));
        $sms->send(env('KAVENEGAR_SENDER'),"09361825145","{$product->name} Was Created");
        */
        $new_product = (!empty($product) && isset($product))? '1' : '0';
        $title = "Admin Panel";
        return view('dashboard',compact('new_product','title'));
    }

    public function editProduct($id)
    {
        $product = products::findOrFail($id);
        $this->authorize('update',$product);
        $categories = category::all();
        $title = "edit $product->name";
        return view('edit-product',compact('product','categories','title'));
    }

    public function updateProduct(Request $request,$id)
    {
        $product_params = $request->only(['name','description','price','weight']);
        $product = products::findOrFail($id);
        $product->update($product_params);
        $product->categories()->sync($request->get('category_id'));
        return redirect("product/{$id}");
    }

}
