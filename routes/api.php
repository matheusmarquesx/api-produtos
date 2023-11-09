<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return 'hello';
});

// Listar todos os produtos
Route::get('/produtos', [ProdutoController::class, 'index']);

// Mostrar detalhes de um produto específico
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

// Criar um novo produto
Route::post('/produtos', [ProdutoController::class, 'store']);

// Atualizar um produto existente
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);

// Excluir um produto
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);