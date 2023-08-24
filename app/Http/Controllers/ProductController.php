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


     public function show($id){
        $product = Product::where('name', '=', $id)->first();
        return response()->json($product);
     }
    
    
     public function all() {
        return response()->json(Product::all(), 200);
     }

     public function list(Request $request){
        return response()->json(Product::paginate($request->input('per_page')));
     }

     public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'value' => 'required|integer',
            'description' => 'string'
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
            'description' => $request->input('description')
        ]);

        return response()->json(["message" => "Product created", "product" => $product], 200);
     }


     public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->fill($request->all())->update();

        return response()->json(["message" => "Product updated", "product" => $product], 200);
     }


     public function delete($id){
        Product::findOrFail($id)->delete();
        return response()->json(["message" => "Product deleted"], 200);
     }

    //
}
