<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Exibe a página de revisão completa do carrinho.
     * (Rota: GET /carrinho)
     */
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        
        $total = 0;
        foreach ($carrinho as $item) {
            // Certifique-se de que 'preco' e 'quantidade' existem
            $total += $item['preco'] * $item['quantidade'];
        }

        // Retorna a view de revisão completa (carrinho/index.blade.php)
        return view('carrinho.index', compact('carrinho', 'total'));
    }

    /**
     * Adiciona um produto ao carrinho (Geralmente via POST/AJAX).
     * (Rota: POST /carrinho/adicionar)
     */
    public function adicionar(Request $request)
    {
        $produto_id = $request->input('produto_id');
        $quantidade = $request->input('quantidade', 1);
        
        // 1. Simulação: Busca de dados do produto (em um sistema real, viria do DB)
        // Para testes, usamos dados fixos
        $produto = [
            'id' => $produto_id,
            'nome' => 'Produto Teste ' . $produto_id,
            'preco' => 30.50, // Exemplo de preço
            'imagem_nome' => 'default.png' // Nome da imagem para o overlay
        ];

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto_id])) {
            // Produto já existe, aumenta a quantidade
            $carrinho[$produto_id]['quantidade'] += $quantidade;
        } else {
            // Adiciona o novo produto
            $carrinho[$produto_id] = [
                "nome" => $produto['nome'],
                "quantidade" => $quantidade,
                "preco" => $produto['preco'],
                "imagem_nome" => $produto['imagem_nome']
            ];
        }

        session()->put('carrinho', $carrinho);

        // Retorna uma resposta JSON para o AJAX
        return response()->json(['success' => true, 'message' => 'Produto adicionado com sucesso!']);
    }

    /**
     * Remove um item do carrinho.
     * (Rota: POST /carrinho/remover/{id})
     */
    public function remover($id)
    {
        $carrinho = session()->get('carrinho');

        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }

        // Retorna JSON para o AJAX do Mini Carrinho
        return response()->json(['success' => true, 'message' => 'Produto removido.']);
    }
    
    /**
     * Atualiza a quantidade de um item (Usado na página de revisão ou overlay).
     * (Rota: POST /carrinho/atualizar/{id})
     */
    public function atualizar(Request $request, $id)
    {
        $carrinho = session()->get('carrinho');
        $nova_quantidade = $request->input('quantidade');
        
        if (isset($carrinho[$id]) && $nova_quantidade > 0) {
            $carrinho[$id]['quantidade'] = $nova_quantidade;
            session()->put('carrinho', $carrinho);
            return response()->json(['success' => true, 'message' => 'Quantidade atualizada.']);
        }

        return response()->json(['success' => false, 'message' => 'Erro ao atualizar.']);
    }
    
    /**
     * Retorna os dados do carrinho em formato JSON para o Mini Carrinho (Overlay).
     * (Rota: GET /carrinho/json)
     */
    public function getCartJson()
    {
        $carrinho = session()->get('carrinho', []);
        $total = 0;
        
        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return response()->json([
            'carrinho' => $carrinho,
            // Retorna o total formatado para exibição no frontend
            'total' => number_format($total, 2, ',', '.')
        ]);
    }
}