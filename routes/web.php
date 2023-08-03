<?php

use Illuminate\Support\Facades\DB;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// Rota para testar a conexão com o banco de dados
$router->get('/testar-conexao', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['message' => 'Conexão com o banco de dados bem-sucedida!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()], 500);
    }
}); 