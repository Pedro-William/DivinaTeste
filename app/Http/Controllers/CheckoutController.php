<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Validação básica: Garante que o carrinho não está vazio.
     */
    protected function checkCart()
    {
        if (!session('carrinho') || count(session('carrinho')) === 0) {
            return redirect()->route('carrinho.index')->with('erro', 'Seu carrinho está vazio.');
        }
        return null;
    }

    /**
     * Etapa 1: Dados do Usuário (Login/Convidado).
     * (Rota: GET /checkout)
     */
    public function userData()
    {
        if ($redirect = $this->checkCart()) {
            return $redirect;
        }

        // Se o usuário estiver logado, avança para a próxima etapa
        if (Auth::check()) {
            return redirect()->route('checkout.address_data');
        }

        // Caso contrário, pede dados de convidado ou login
        return view('checkout.user_data');
    }

    /**
     * Etapa 1 (POST): Salva dados do convidado na sessão.
     * (Rota: POST /checkout/store-user)
     */
    public function storeUser(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        session(['checkout_user_data' => $request->only(['email', 'nome', 'telefone'])]);
        
        return redirect()->route('checkout.address_data');
    }
    
    /**
     * Etapa 2: Endereço de Entrega.
     * (Rota: GET /checkout/endereco)
     */
    public function addressData()
    {
        if ($redirect = $this->checkCart()) {
            return $redirect;
        }
        
        // Garante que a Etapa 1 foi concluída
        if (!Auth::check() && !session('checkout_user_data')) {
            return redirect()->route('checkout.user_data')->with('erro', 'Informe seus dados para continuar.');
        }

        // Lógica para buscar endereços existentes do usuário logado
        $enderecos = Auth::check() ? Auth::user()->enderecos : collect();
        
        return view('checkout.address_data', compact('enderecos'));
    }
    
    /**
     * Etapa 2 (POST): Salva o endereço de entrega na sessão.
     * (Rota: POST /checkout/store-address)
     */
    public function storeAddress(Request $request)
    {
        $request->validate([
            'cep' => 'required|string|max:10', 
            'rua' => 'required|string', 
            'numero' => 'required|string',
            // ... mais validações de endereço ...
        ]);
        
        session(['checkout_address' => $request->all()]);
        
        return redirect()->route('checkout.payment_data');
    }
    
    /**
     * Etapa 3: Método de Pagamento (Pix ou Cartão).
     * (Rota: GET /checkout/pagamento)
     */
    public function paymentData()
    {
        if ($redirect = $this->checkCart()) {
            return $redirect;
        }
        
        // Garante que a Etapa 2 foi concluída
        if (!session('checkout_address')) {
            return redirect()->route('checkout.address_data')->with('erro', 'Informe o endereço para continuar.');
        }
        
        // Cálculo final do total (Incluindo frete e impostos, se aplicável)
        $carrinho = session('carrinho');
        $total = 0;
        foreach ($carrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
        
        return view('checkout.payment_data', compact('total'));
    }
    
    /**
     * Etapa Final (POST): Processa o pagamento e finaliza a compra.
     * (Rota: POST /checkout/processar)
     */
    public function processar(Request $request)
    {
        // 1. Validação do método de pagamento
        $request->validate(['metodo_pagamento' => 'required|in:pix,cartao']);
        
        // 2. INÍCIO DA TRANSAÇÃO
        DB::beginTransaction();
        
        try {
            // 3. Integração de Pagamento (Simulação)
            // Lógica real: Chamada à API de pagamento (Stripe, PagSeguro, etc.)
            $pagamento_sucesso = true; 
            
            if (!$pagamento_sucesso) {
                 throw new \Exception('Pagamento recusado pela operadora.');
            }
            
            // 4. Criação do Pedido no Banco de Dados
            // Ex: $pedido = Pedido::create([... dados da sessão e do Auth::user() ...]);
            // Ex: $pedido->itens()->createMany([... itens do session('carrinho') ...]);
            
            // 5. Limpa a sessão
            session()->forget(['carrinho', 'checkout_user_data', 'checkout_address']);
            
            DB::commit();
            
            // Redireciona para a página de sucesso (passando o ID do pedido, se necessário)
            return redirect()->route('pedido.sucesso');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('erro', 'Falha ao processar o pedido: ' . $e->getMessage());
        }
    }
    
    /**
     * Página de Sucesso.
     * (Rota: GET /pedido-finalizado)
     */
    public function sucesso()
    {
        return view('checkout.sucesso');
    }
}