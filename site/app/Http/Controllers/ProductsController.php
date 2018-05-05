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
}
