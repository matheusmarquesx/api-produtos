<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Produto;

class ProdutoControllerTest extends TestCase
{
    use DatabaseTransactions;

    // Teste para exibir todos um produto

    public function testIndex()
    {
        $response = $this->get('/produtos');
    
        $response->assertStatus(200)
                 ->assertJsonCount(0, 'data');
    }
    // Teste para exibir um produto

    public function testShow()
    {
        $produto = Produto::create([
            'nome' => 'Nome do Produto',
            'descricao' => 'Descrição do Produto',
            'preco' => 19.99,
            'quantidade' => 50,
        ]);

        $response = $this->json('GET', "/produtos/{$produto->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $produto->id,
                     'nome' => $produto->nome,
                     'descricao' => $produto->descricao,
                     'preco' => $produto->preco,
                     'quantidade' => $produto->quantidade,
                 ]);
    }
    // Teste para criar produto
    public function testStore()
    {
        $data = [
            'nome' => 'Novo Produto',
            'descricao' => 'Descrição do Novo Produto',
            'preco' => 19.99,
            'quantidade' => 50,
        ];

        $response = $this->json('POST', '/produtos', $data);

        $response->assertStatus(201)
                ->assertJson($data);
    }
    // Teste para deletar produto
    public function testDestroy()
    {
    $produto = Produto::create([
        'nome' => 'Produto de Teste',
        'descricao' => 'Descrição do Produto de Teste',
        'preco' => 10.99,
        'quantidade' => 50,
    ]);

    $response = $this->json('DELETE', "/produtos/{$produto->id}");

    $response->assertStatus(200)
             ->assertJson(['message' => 'Produto removido']);
  }
}
