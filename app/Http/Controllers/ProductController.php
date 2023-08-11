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
        return Product::create([
            'name' => $request->input('nome'),
            'value' => $request->input('value'),
            'description' => $request->input('description'),
        ]);
    }

}
