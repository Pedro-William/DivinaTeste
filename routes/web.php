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

// Rotas Principais
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


// --- ROTAS NOVAS DE SISTEMA (Sem o prefixo da categoria) ---
// verificar se necessita entrada de dados
Route::get('/home/cadastro', function () {
    return view('cadastro');
});

Route::get('/home/confirmacao', function () {
    return view('confirmacao');
});

Route::get('/home/conta', function () {
    return view('conta');
});



















// --- ROTAS DE CONTA/CATEGORIAS BASE ---

Route::get('/home/minha conta', function () {
    return view('minhaconta');
});

Route::get('/home/sair', function () {
    return view('sair');
});

Route::get('/home/sabonetes', function () {
    return view('sabonete');
});
Route::get('/home/aromatizantes', function () {
    return view('aromatizante');
});

Route::get('/home/acessorios', function () {
    return view('acessorios');
});

Route::get('/home/kits', function () {
    return view('kits');
});

Route::get('/home/velas', function () {
    return view('vela');
});

Route::get('/home/oleos essenciais', function () {
    return view('oleoessencial');
});

// --- ROTAS DE PRODUTOS ESPECÍFICOS (Iniciais) ---











// --- ROTAS DE ACESSÓRIOS (Sub-itens) ---

Route::get('/home/acessorios/difusor portatio', function () {
    return view('acessorios.difusorportatio');
});


Route::get('/home/acessorios/escova de cabelo', function () {
    return view('acessorios.escovadecabelo');
});


Route::get('/home/acessorios/esponja vegetal', function () {
    return view('acessorios.esponjavegetal');
});

Route::get('/home/acessorios/necessarie', function () {
    return view('acessorios.necessarie');
});

Route::get('/home/acessorios/saboneteira', function () {
    return view('acessorios.saboneteira');
});


Route::get('/home/escova de dente', function () {
    return view('acessorios.escovadedente');
});



Route::get('/home/acessorios/ecobag', function () {
    return view('acessorios.ecobag');
});


Route::get('/home/acessorios/difusor ', function () {
    return view('acessorios.difusor');
});



// --- ROTAS DE AROMATIZANTES (Sub-itens) ---

Route::get('/home/aromatizantes/alecrim', function () {
    return view('aromatizantes.aromatizante-alecrim');
});

Route::get('/home/aromatizantes/baunilha', function () {
    return view('aromatizantes.aromatizante-baunilha');
});

Route::get('/home/aromatizantes/capim limao', function () {
    return view('aromatizantes.aromatizante-capimlimao');
});

Route::get('/home/aromatizantes/citronela', function () {
    return view('aromatizantes.aromatizante-citronela');
});


Route::get('/home/aromatizantes/melaleuca', function () {
    return view('aromatizantes.aromatizante-melaleuca');
});

Route::get('/home/aromatizante de canela', function () {
    return view('aromatizantes.aromatizante-canela');
});

Route::get('/home/aromatizante de hortela', function () {
    return view('aromatizantes.aromatizante-hortela');
});


Route::get('/home/aromatizador de lavanda', function () {
    return view('aromatizantes.aromatizante-lavanda');
});








// --- ROTAS DE ESSÊNCIAS (NOVAS) ---

Route::get('/home/essencias/alecrim', function () {
    return view('essencias.essencia-alecrim');
});

Route::get('/home/essencias/camomila romana', function () {
    return view('essencias.essencia-camomilaromana');
});

Route::get('/home/essencias/citronela', function () {
    return view('essencias.essencia-citronela');
});

Route::get('/home/essencias/copaiba', function () {
    return view('essencias.essencia-copaiba');
});

Route::get('/home/essencias/eucalipto', function () {
    return view('essencias.essencia-eucalipto');
});

Route::get('/home/essencias/lavanda', function () {
    return view('essencias.essencia-lavanda');
});

Route::get('/home/essencias/melaleuca', function () {
    return view('essencias.essencia-melaleuca');
});

Route::get('/home/essencias/ylang ylang', function () {
    return view('essencias.essencia-ylangylang');
});




// --- ROTAS DE KITS (NOVAS) ---

Route::get('/home/kits/copaiba', function () {
    return view('kits.kit-copaiba');
});

Route::get('/home/kits/blue tansy', function () {
    return view('kits.kits-bluetansy');
});

Route::get('/home/kits/camomila', function () {
    return view('kits.kits-camomila');
});

Route::get('/home/kits/canela', function () {
    return view('kits.kits-canela');
});

Route::get('/home/kits/capim limao', function () {
    return view('kits.kits-capimlimao');
});

Route::get('/home/kits/lavanda', function () {
    return view('kits.kits-lavanda');
});

Route::get('/home/kits/melaleuca', function () {
    return view('kits.kits-melaleuca');
});

Route::get('/home/kits/ylang ylang', function () {
    return view('kits.kits-ylanglang');
});




// --- ROTAS DE LINHAS (NOVAS) ---

Route::get('/home/linhas/alecrim', function () {
    return view('linhas.linha-alecrim');
});

Route::get('/home/linhas/camomila', function () {
    return view('linhas.linha-camomila');
});

Route::get('/home/linhas/capim limao', function () {
    return view('linhas.linha-capimlimao');
});

Route::get('/home/linhas/copaiba', function () {
    return view('linhas.linha-copaiba');
});

Route::get('/home/linhas/eucalipto', function () {
    return view('linhas.linha-eucalipto');
});

Route::get('/home/linhas/lavanda', function () {
    return view('linhas.linha-lavanda');
});

Route::get('/home/linhas/melaleuca', function () {
    return view('linhas.linha-melaleuca');
});

Route::get('/home/linhas/ylang ylang', function () {
    return view('linhas.linha-ylanglang');
});





// --- ROTAS DE SABONETES ---

Route::get('/home/sabonetes/argila rosa e lavanda', function () {
    return view('sabonetes.sabonete-argilarosaelavanda');
});

Route::get('/home/sabonetes/argila verde e alecrim', function () {
    return view('sabonetes.sabonete-argilaverdeealecrim');
});


Route::get('/home/sabonetes/camomila', function () {
    return view('sabonetes.sabonete-camomila');
});

Route::get('/home/Sabonete Aveia e Mel', function () {
    return view('sabonetes.sabonete-aveiaemel');
});


Route::get('/home/sabonetes/carvao ativado e lavanda', function () {
    return view('sabonetes.sabonete-carvaoativadoelavanda');
});

Route::get('/home/sabonetes/coco e baunilha', function () {
    return view('sabonetes.sabonete-cocoebaunilha');
});

Route::get('/home/sabonetes/laranja e camomila', function () {
    return view('sabonetes.sabonete-laranjacecamila');
});


Route::get('/home/sabonete canela', function () {
    return view('sabonetes.sabonete-canela');
});










// --- ROTAS DE VELAS ---

Route::get('/home/velas/alecrim', function () {
    return view('velas.vela-alecrim');
});

Route::get('/home/velas/blue tansy', function () {
    return view('velas.vela-bluetansy');
});

Route::get('/home/velas/camomila', function () {
    return view('velas.vela-camomila');
});

Route::get('/home/velas/capim limao', function () {
    return view('velas.vela-capimlimao');
});

Route::get('/home/velas/eucalipto', function () {
    return view('velas.vela-eucalipto');
});


Route::get('/home/velas/lavanda', function () {
    return view('velas.vela-lavanda');
});

Route::get('/home/vela hiba', function () {
    return view('velas.vela-hiba');
});

Route::get('/home/vela de hortela e pimenta', function () {
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
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    // REGISTRO (CADASTRO)
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
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