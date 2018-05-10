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
        $exploded = explode(',', request('image'));
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[1], 'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $fileName = str_random() . '.' . $extension;
        $path = public_path() . '/img/' . $fileName;

        file_put_contents($path, $decoded);

    	$product = Product::create(request()->except('image') + [
            'user_id' => auth()->id(),
            'image' => $fileName
        ]);
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
    	$product = Product::find($id);

    	if ($product) {
    		return response()->json($product);
    	}

    	return response()->json(['error' => 'Resource not found!'], 404);
    	
    }

    public function update($id)
    {
    	$product = Product::find($id);
    	$product->update(request()->all());

    	return response()->json($product);
    }
}
