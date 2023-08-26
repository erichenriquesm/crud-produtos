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

   
    public function index($id)
    {
      $product = Product::where('id', '=', $id)->first();
      return response()->json($product);
    }

   public function list(Request $request)
   {
      return response()->json(Product::paginate($request->input('per_page') ?? 15));
   }
   
   public function all()
   {
      return response()->json(Product::all());
   }

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


   public function update(Request $request, $id)
   {

      $this->validate($request, [
         'name' => 'string',
         'value' => 'integer',
         'description' => 'string'
      ]);

      $product = Product::findOrFail($id)->fill($request->all());
      $product->update();

      return response()->json(['message' => 'Product updated!', 'product' => $product]);
   }


   public function delete($id)
   {
      Product::findOrFail($id)->delete();

      return response()->json(['message' => 'Product deleted!']);
   }
}
