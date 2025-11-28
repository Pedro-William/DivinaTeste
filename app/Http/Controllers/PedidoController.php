<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection; // Usado para a simulação de dados

// use App\Models\Pedido; // Supondo que você tem um modelo Pedido
// use App\Models\Endereco; // Para simular dados aninhados

class PedidoController extends Controller
{
    /**
     * Exibe a lista de pedidos do usuário autenticado.
     * (Rota: GET /meus-pedidos)
     */
    public function index()
    {
        // Garante que apenas usuários logados acessem
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Simulação de Pedidos para teste (Substitua pela lógica real do banco de dados)
        $pedidos = $this->simularListaPedidos();

        // A sua view 'meuspedidos.blade.php' usará esta variável $pedidos
        return view('meuspedidos', compact('pedidos')); 
    }

    /**
     * Exibe os detalhes de um pedido específico.
     * (Rota: GET /meus-pedidos/{id})
     */
    public function show($id)
    {
        // Garante que apenas usuários logados e donos do pedido acessem
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Simulação de carregamento do Pedido (Substitua pela lógica real do banco de dados)
        $pedido = $this->simularDetalhesPedido($id);

        // Se o pedido não for encontrado, redireciona com erro.
        if (!$pedido) {
            return redirect()->route('meuspedidos')->with('error', 'Pedido não encontrado ou você não tem permissão para visualizá-lo.');
        }
        
        // A sua view 'pedidos.show.blade.php' usará esta variável $pedido
        return view('pedidos.show', compact('pedido'));
    }
    
    // ====================================================================
    // MÉTODOS DE SIMULAÇÃO (DEVERÃO SER REMOVIDOS NO PROJETO FINAL)
    // ====================================================================

    private function simularListaPedidos(): Collection
    {
        // Simula a busca de pedidos do usuário logado (Auth::id())
        return collect([
            (object)[
                'id' => 1001,
                'status' => 'Enviado',
                'created_at' => now()->subDays(5),
                'valor_total' => 159.90,
                'total_itens' => 3,
            ],
            (object)[
                'id' => 1002,
                'status' => 'Pago',
                'created_at' => now()->subDays(10),
                'valor_total' => 85.00,
                'total_itens' => 1,
            ],
            (object)[
                'id' => 1003,
                'status' => 'Pendente',
                'created_at' => now()->subDays(1),
                'valor_total' => 220.50,
                'total_itens' => 5,
                'metodo_pagamento' => 'PIX', // Importante para a view de detalhes
            ],
        ]);
    }
    
    private function simularDetalhesPedido($id): ?object
    {
        // Simula o carregamento do pedido específico
        $lista = $this->simularListaPedidos();
        $pedidoSimulado = $lista->firstWhere('id', $id);
        
        if (!$pedidoSimulado) {
            return null;
        }

        // Adiciona dados detalhados necessários para 'pedidos/show.blade.php'
        $pedidoSimulado->subtotal = $pedidoSimulado->valor_total - 25.00; // Frete simulado
        $pedidoSimulado->valor_frete = 25.00;
        $pedidoSimulado->metodo_pagamento = $pedidoSimulado->metodo_pagamento ?? 'Cartão de Crédito';
        
        // Simulação de endereço
        $pedidoSimulado->endereco_entrega = (object)[
            'nome_completo' => 'Isadora Burgos',
            'rua' => 'Rua dos Sabonetes',
            'numero' => '123',
            'complemento' => 'Apto 101',
            'bairro' => 'Jardim Aromático',
            'cidade' => 'São Paulo',
            'cep' => '01234-567',
        ];
        
        // Simulação de itens do pedido
        $pedidoSimulado->itens = collect([
            (object)[
                'produto' => (object)['nome' => 'Sabonete Artesanal Lavanda'],
                'quantidade' => 1,
                'preco_unitario' => 35.00,
                'subtotal' => 35.00,
            ],
            (object)[
                'produto' => (object)['nome' => 'Vela Aromática Sândalo'],
                'quantidade' => 2,
                'preco_unitario' => 50.00,
                'subtotal' => 100.00,
            ],
        ]);
        
        return $pedidoSimulado;
    }
}