<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\RegisteredUserController;

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PedidoController; // Para gerenciar 'Meus Pedidos'

// Rotas Principais
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


// --- ROTAS NOVAS DE SISTEMA (Sem o prefixo da categoria) ---
// verificar se necessita entrada de dados
Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/confirmacao', function () {
    return view('confirmacao');
});

Route::get('/conta', function () {
    return view('conta');
});

Route::get('/meus pedidos', function () {
    return view('meuspedidos');
});



















// --- ROTAS DE CONTA/CATEGORIAS BASE ---

Route::get('/minha conta', function () {
    return view('minhaconta');
});

Route::get('/sair', function () {
    return view('sair');
});

Route::get('/sabonetes', function () {
    return view('sabonete');
});
Route::get('/aromatizantes', function () {
    return view('aromatizante');
});

Route::get('/acessorios', function () {
    return view('acessorios');
});

Route::get('/kits', function () {
    return view('kits');
});

Route::get('/velas', function () {
    return view('vela');
});

Route::get('/oleos essenciais', function () {
    return view('oleoessencial');
});

// --- ROTAS DE PRODUTOS ESPECÍFICOS (Iniciais) ---











// --- ROTAS DE ACESSÓRIOS (Sub-itens) ---

Route::get('/difusor portatio', function () {
    return view('acessorios.difusorportatio');
});


Route::get('/escova de cabelo', function () {
    return view('acessorios.escovadecabelo');
});


Route::get('/esponja vegetal', function () {
    return view('acessorios.esponjavegetal');
});

Route::get('/necessarie', function () {
    return view('acessorios.necessarie');
});

Route::get('/saboneteira', function () {
    return view('acessorios.saboneteira');
});


Route::get('/escova de dente', function () {
    return view('acessorios.escovadedente');
});



Route::get('/ecobag', function () {
    return view('acessorios.ecobag');
});


Route::get('/difusor ', function () {
    return view('acessorios.difusor');
});



// --- ROTAS DE AROMATIZANTES (Sub-itens) ---

Route::get('/alecrim', function () {
    return view('aromatizantes.aromatizante-alecrim');
});

Route::get('/baunilha', function () {
    return view('aromatizantes.aromatizante-baunilha');
});

Route::get('/capim limao', function () {
    return view('aromatizantes.aromatizante-capimlimao');
});

Route::get('/citronela', function () {
    return view('aromatizantes.aromatizante-citronela');
});


Route::get('/melaleuca', function () {
    return view('aromatizantes.aromatizante-melaleuca');
});

Route::get('/aromatizante de canela', function () {
    return view('aromatizantes.aromatizante-canela');
});

Route::get('/aromatizante de hortela', function () {
    return view('aromatizantes.aromatizante-hortela');
});


Route::get('/aromatizador de lavanda', function () {
    return view('aromatizantes.aromatizante-lavanda');
});








// --- ROTAS DE ESSÊNCIAS (NOVAS) ---

Route::get('/alecrim', function () {
    return view('essencias.essencia-alecrim');
});

Route::get('/camomila romana', function () {
    return view('essencias.essencia-camomilaromana');
});

Route::get('/citronela', function () {
    return view('essencias.essencia-citronela');
});

Route::get('/copaiba', function () {
    return view('essencias.essencia-copaiba');
});

Route::get('/eucalipto', function () {
    return view('essencias.essencia-eucalipto');
});

Route::get('/lavanda', function () {
    return view('essencias.essencia-lavanda');
});

Route::get('/melaleuca', function () {
    return view('essencias.essencia-melaleuca');
});

Route::get('/ylang ylang', function () {
    return view('essencias.essencia-ylangylang');
});




// --- ROTAS DE KITS (NOVAS) ---

Route::get('/copaiba', function () {
    return view('kits.kit-copaiba');
});

Route::get('/blue tansy', function () {
    return view('kits.kits-bluetansy');
});

Route::get('/camomila', function () {
    return view('kits.kits-camomila');
});

Route::get('/canela', function () {
    return view('kits.kits-canela');
});

Route::get('/capim limao', function () {
    return view('kits.kits-capimlimao');
});

Route::get('/lavanda', function () {
    return view('kits.kits-lavanda');
});

Route::get('/melaleuca', function () {
    return view('kits.kits-melaleuca');
});

Route::get('/ylang ylang', function () {
    return view('kits.kits-ylanglang');
});




// --- ROTAS DE LINHAS (NOVAS) ---

Route::get('/alecrim', function () {
    return view('linhas.linha-alecrim');
});

Route::get('/camomila', function () {
    return view('linhas.linha-camomila');
});

Route::get('/capim limao', function () {
    return view('linhas.linha-capimlimao');
});

Route::get('/copaiba', function () {
    return view('linhas.linha-copaiba');
});

Route::get('/eucalipto', function () {
    return view('linhas.linha-eucalipto');
});

Route::get('/lavanda', function () {
    return view('linhas.linha-lavanda');
});

Route::get('/melaleuca', function () {
    return view('linhas.linha-melaleuca');
});

Route::get('/ylang ylang', function () {
    return view('linhas.linha-ylanglang');
});





// --- ROTAS DE SABONETES ---

Route::get('/argila rosa e lavanda', function () {
    return view('sabonetes.sabonete-argilarosaelavanda');
});

Route::get('/argila verde e alecrim', function () {
    return view('sabonetes.sabonete-argilaverdeealecrim');
});


Route::get('/camomila', function () {
    return view('sabonetes.sabonete-camomila');
});

Route::get('/Sabonete Aveia e Mel', function () {
    return view('sabonetes.sabonete-aveiaemel');
});


Route::get('/carvao ativado e lavanda', function () {
    return view('sabonetes.sabonete-carvaoativadoelavanda');
});

Route::get('/coco e baunilha', function () {
    return view('sabonetes.sabonete-cocoebaunilha');
});

Route::get('/laranja e camomila', function () {
    return view('sabonetes.sabonete-laranjacecamila');
});


Route::get('/sabonete canela', function () {
    return view('sabonetes.sabonete-canela');
});










// --- ROTAS DE VELAS ---

Route::get('/alecrim', function () {
    return view('velas.vela-alecrim');
});

Route::get('/blue tansy', function () {
    return view('velas.vela-bluetansy');
});

Route::get('/camomila', function () {
    return view('velas.vela-camomila');
});

Route::get('/capim limao', function () {
    return view('velas.vela-capimlimao');
});

Route::get('/eucalipto', function () {
    return view('velas.vela-eucalipto');
});


Route::get('/lavanda', function () {
    return view('velas.vela-lavanda');
});

Route::get('/vela hiba', function () {
    return view('velas.vela-hiba');
});

Route::get('/vela de hortela e pimenta', function () {
    return view('velas.vela-hortelapimenta');
});



//ROTAS PAG ADM

// Rota para o Painel
Route::get('/painel', function() {
    return view('painel');
})->name('painel');

// Rotas para Admin com prefixo "admin" (Rotas nomeadas customizadas)
Route::prefix('admin')->name('admin.')->group(function() {
    // GET /admin -> admin.index (Usada para Listagem e Filtro)
    Route::get('/', [AdminController::class, 'index'])->name('index'); 
    
    // GET /admin/create -> admin.create
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    
    // POST /admin/store -> admin.store
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    
    // GET /admin/{admin} -> admin.show
    Route::get('/{admin}', [AdminController::class, 'show'])->name('show');
    
    // GET /admin/{admin}/edit -> admin.edit
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');
    
    // PUT/PATCH /admin/{admin} -> admin.update
    Route::put('/{admin}', [AdminController::class, 'update'])->name('update');
    
    // DELETE /admin/{admin} -> admin.destroy
    Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
});

// Rotas Resource para os outros módulos
Route::resource('categ', CategController::class)->parameters([
    'categ' => 'categoria',
]);
Route::resource('produto', ProdutoController::class);

// ✅ CORREÇÃO APLICADA: Força o parâmetro do modelo a ser 'subcategoria' em vez de 'subcategorium'
Route::resource('subcategoria', SubcategoriaController::class)->parameters([
    'subcategoria' => 'subcategoria',
]);

Route::resource('fornecedor', FornecedorController::class);



//LOGIN

// Rotas acessíveis APENAS para usuários NÃO autenticados (guest)
Route::middleware('guest')->group(function () {
    
    // LOGIN
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    // REGISTRO (CADASTRO)
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});


/*
|--------------------------------------------------------------------------
| ROTAS PROTEGIDAS (Middleware 'auth')
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // PAINEL (DASHBOARD)
    Route::get('/painel', function() {
        return view('painel');
    })->name('painel');

    // Páginas de Usuário (Minha Conta e Pedidos)
    Route::get('/minha-conta', function () { 
        return view('conta.minha-conta'); 
    })->name('minhaconta');
    
    // ✅ ROTA DE ATUALIZAÇÃO DA CONTA (PUT/PATCH para o formulário funcionar)
    Route::put('/update-account-data', [UserController::class, 'updateAccount'])->name('conta.update');

    Route::get('/meus-pedidos', function () { 
        return view('conta.meus-pedidos'); 
    })->name('meuspedidos');
    
    // ROTA FAVORITOS PROTEGIDA
    Route::get('/favoritos', function () { 
        return view('conta.favoritos'); 
    })->name('favoritos');
});

//LOGICA COMPRA CARRINHO

// --- CARRINHO (CRUD BÁSICO) ---
// Visualizar a página de revisão completa
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
// AJAX: Adicionar item
Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
// AJAX: Remover item
Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
// AJAX: Atualizar item (Quantidade)
Route::post('/carrinho/atualizar/{id}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');
// AJAX: Obter dados JSON para o Mini Carrinho (Overlay)
Route::get('/carrinho/json', [CarrinhoController::class, 'getCartJson'])->name('carrinho.json');

// --- CHECKOUT (3 ETAPAS) ---
Route::prefix('checkout')->group(function () {
    // Etapa 1: Dados do Usuário (Login/Convidado)
    Route::get('/', [CheckoutController::class, 'userData'])->name('checkout.user_data');
    Route::post('/store-user', [CheckoutController::class, 'storeUser'])->name('checkout.store_user');

    // Etapa 2: Endereço de Entrega
    Route::get('/endereco', [CheckoutController::class, 'addressData'])->name('checkout.address_data');
    Route::post('/store-address', [CheckoutController::class, 'storeAddress'])->name('checkout.store_address');

    // Etapa 3: Pagamento (Pix ou Cartão)
    Route::get('/pagamento', [CheckoutController::class, 'paymentData'])->name('checkout.payment_data');
    Route::post('/processar', [CheckoutController::class, 'processar'])->name('checkout.processar');
});

// Finalização
Route::get('/pedido-finalizado', [CheckoutController::class, 'sucesso'])->name('pedido.sucesso');