<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index($id)
    {
        try{
            $product = $this->product->findOrFail($id);
            return response()->json($product);
        }catch(\Exception $th){
            Log::error(['th' => $th]);
            return response()->json(['message' => 'Product not found :(']);

        }
    }

    public function list(Request $request)
    {
        $products = $this->product->paginate($request->per_page ?? 15);
        return response()->json($products);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'value' => 'required',
            'description' => 'string'
        ]);

        $product = $this->product->create([
            'name' => $request->input('name'),
            'value' =>$request->input('value'),
            'description' => $request->input('description')
        ]);

        return response()->json(['message' => 'Product created!', 'product' => $product]);
    }

    public function update(Request $request, $id){

        try{
            $product = $this->product->findOrFail($id);
            $product->fill($request->all())->update();
            return response()->json(['message' => 'Product updated!', 'product' => $product]);
        }catch(\Exception $th){
            Log::error(['th' => $th]);
            return response()->json(['message' => 'Error to update product :(']);

        }
    }

    public function delete($id){

        try{
            $this->product->findOrFail($id)->delete();
            return response()->json(['message' => 'Product deleted']);
        }catch(\Exception $th){
            Log::error(['th' => $th]);
            return response()->json(['message' => 'Error to delete product :(']);

        }
    }

    protected $product;
}
