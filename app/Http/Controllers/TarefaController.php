<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function list(Request $request)
    {
        return Tarefa::paginate($request->input('per_page') ?? 15);
    }
    
}
