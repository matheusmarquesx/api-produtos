<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(5);
        return response()->json($produtos);
    }
    
    public function show($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return response()->json($produto);
    }
    
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->quantidade = $request->input('quantidade');
        $produto->save();
        return response()->json($produto, 201);
    }
    
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->quantidade = $request->input('quantidade');
        $produto->save();
        return response()->json($produto);
    }
    
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        $produto->delete();
        return response()->json(['message' => 'Produto removido']);
    }
}
