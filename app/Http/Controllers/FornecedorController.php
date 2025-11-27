<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource (READ - Listar).
     */
    public function index(Request $request)
    {
        // Obtém o termo de pesquisa (search) da requisição
        $search = $request->input('search');

        // Inicia a query com todos os fornecedores
        $query = Fornecedor::query();

        // Aplica o filtro de pesquisa, se houver
        if ($search) {
            $query->where('nome', 'LIKE', '%' . $search . '%')
                  ->orWhere('cnpj', 'LIKE', '%' . $search . '%')
                  ->orWhere('cidade', 'LIKE', '%' . $search . '%');
        }

        // Paginação (15 itens por página)
        $fornecedores = $query->paginate(15);
        $fornecedores->appends(['search' => $search]); // Mantém o filtro na paginação

        return view('fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource (CREATE - Formulário).
     */
    public function create()
    {
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage (CREATE - Salvar).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:fornecedores,email', // ✅ Usando 'fornecedores'
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj',      // ✅ Usando 'fornecedores'
            'telefone' => 'required|string|max:20',
            'rua' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2', // Ex: SP, RJ
            'cep' => 'required|string|max:10',
        ]);

        Fornecedor::create($request->all());

        return redirect()->route('fornecedor.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource (READ - Detalhes).
     */
    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedor.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource (UPDATE - Formulário).
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage (UPDATE - Salvar Edição).
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            // O 'unique' deve ignorar o registro atual
            'email' => 'required|email|max:255|unique:fornecedores,email,'.$fornecedor->id, 
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj,'.$fornecedor->id,
            'telefone' => 'required|string|max:20',
            'rua' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:10',
        ]);

        $fornecedor->update($request->all());

        return redirect()->route('fornecedor.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage (DELETE).
     */
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        // O cascade definido na migração de produtos irá remover todos os produtos deste fornecedor.
        
        return redirect()->route('fornecedor.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}