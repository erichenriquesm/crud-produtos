<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all()
    {
        return response()->json(Product::all());
    }

    public function index($id)
    {
        return Product::find($id);
    }

    public function list(Request $request){
        return response()->json(Product::paginate($request->input('per_page')));
    }


    public function create(Request $request)
    {

        $this->validate($request, [ //1
            'name' => 'required|string',
            'value' => 'required|integer',
            'description' => 'string'
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'value' => $request->input('value'), //2
            'description' => $request->input('description'),
        ]);

        return response()->json(["message" => "Product created!", "product" => $product], 200); //3
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [ //1
            'name' => 'string',
            'value' => 'integer',
            'description' => 'string'
        ]);

        $product = Product::findOrFail($id)->fill($request->all());
        $product->update();

        return response()->json(['message' => 'Product updated', 'product' => $product], 200); 
    }


    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Product deleted'], 200); 
    }



    //
}
