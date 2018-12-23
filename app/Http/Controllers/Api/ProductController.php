<?php

namespace App\Http\Controllers\Api;

use App\products;
use Illuminate\Http\Request;
use App\Http\Requests\storeProduct as StoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic')->only(['store','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return products::with(['user','categories'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = Auth::user();
        $productInput = $request->except(['categories']);
        $categoriesInput = $request->categories;
        $product = $user->products()->create($productInput);
        $product->categories()->attach($categoriesInput);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return products::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, int $id)
    {
        $product_params = $request->only(['name','description','price','weight']);
        $product = products::findOrFail($id);
        $this->authorize('update',$product);
        $product->update($product_params);
        $product->categories()->sync($request->get('categories'));
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = products::findOrFail($id);
        $this->authorize('delete',$product);
        $result = $product->delete();
        if($result) {
            return ['message' => 'Product Destroyed'];
        }else{
            return ['message' => 'Product did not Destroy'];
        }
    }
}
