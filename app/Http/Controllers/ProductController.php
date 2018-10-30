<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeProduct;
use App\products;

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
        $products = products::orderBy('name','asc')->get();
        $title = "Product List";
        return view('archive-product',compact('products','title'));
    }

    public function single($id)
    {
        $product = products::findOrFail($id);
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
        return view('new-product',compact('title'));
    }

    public function saveProduct(storeProduct $request)
    {
        $request->validated();
        $product = $request->except('_token');
        $product['status'] = 1;
        $result = products::create($product);
        $new_product = (!empty($result) && isset($result))? '1' : '0';
        $title = "Admin Panel";
        return view('dashboard',compact('new_product','title'));
    }
}
