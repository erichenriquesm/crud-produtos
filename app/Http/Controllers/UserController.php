<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use Stringable;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all()
    {
        return response()->json(User::all());
    }

    public function index($id)
    {
        return User::find($id);
    }

    public function list(Request $request){
        return response()->json(User::with('products')->paginate($request->input('per_page')));
    }


    public function create(Request $request)
    {

        $this->validate($request, [ //1
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'), //2
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json(["message" => "user created!", "user" => $user], 200); //3
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [ //1
            'name' => 'string',
            'value' => 'integer',
            'description' => 'string'
        ]);

        $user = User::findOrFail($id)->fill($request->all());
        $user->update();

        return response()->json(['message' => 'user updated', 'user' => $user], 200); 
    }


    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['message' => 'user deleted'], 200); 
    }



    //
}
