<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
    	return Product::orderBy('created_at', 'desc')->get();
    }

    public function store()
    {
    	$product = Product::create(request()->all() + ['user_id' => auth()->id()]);
    	return $product;
    }

    public function destroy($id)
    {
    	try {
    		Product::destroy($id);
    	    return response([], 204);
    	} catch (\Exception $e) {
    		return response(['Problem deleting the product'], 500);
    	}
    }

    public function show($id)
    {
    	return response()->json(Product::find($id));
    }

    public function update($id)
    {
    	$product = Product::find($id);
    	$product->update(request()->all());

    	return response()->json($product);
    }
}
