<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function create(Request $request){

        $this->validate($request, [
            'name' => 'required|string|unique:products',
            'value' => 'required|integer',
            'description' => 'required|string'
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'description' => $request->input('description')
        ]);

        return response()->json(['message' => 'Product created!', 'product' => $product]);

    }
}
