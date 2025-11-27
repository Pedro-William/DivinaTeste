<?php

namespace App\Http\Controllers;

use App\Models\Categ; // ✅ O Model ainda é Categ
use Illuminate\Http\Request;

class CategController extends Controller
{
    /**
     * Exibe uma listagem do recurso e aplica filtros de busca.
     */
    public function index(Request $request)
    {
        // Pega o termo de busca da URL (campo 'search' da view)
        $searchTerm = $request->input('search');

        // Inicia a query do Eloquent, ordenando por nome
        $query = Categ::query()->orderBy('nome'); 

        // Aplica a condição de filtro se um termo de busca for fornecido
        if ($searchTerm) {
            // Filtra onde a coluna 'nome' contém o termo de busca
            $query->where('nome', 'like', '%' . $searchTerm . '%');
        }

        // Obtém os resultados filtrados/ordenados com paginação (10 por página)
        // ✅ Index View usa $categs (plural)
        $categs = $query->paginate(10); 

        // Adiciona o termo de busca à paginação para que os links de página funcionem com o filtro
        $categs->appends(['search' => $searchTerm]);

        return view('categ.index', compact('categs'));
    }

    public function create()
    {
        return view('categ.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        Categ::create($request->only('nome'));

        return redirect()->route('categ.index')->with('success', 'Categoria criada!');
    }

    /**
     * Exibe uma categoria específica.
     * @param Categ $categoria - Renomeado de $categ para $categoria
     */
    public function show(Categ $categoria)
    {
        // ✅ Passando $categoria para a view
        return view('categ.show', compact('categoria'));
    }

    /**
     * Exibe o formulário de edição de uma categoria.
     * @param Categ $categoria - Renomeado de $categ para $categoria
     */
    public function edit(Categ $categoria)
    {
        // ✅ Passando $categoria para a view
        return view('categ.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria no banco de dados.
     * @param Categ $categoria - Renomeado de $categ para $categoria
     */
    public function update(Request $request, Categ $categoria)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        $categoria->update($request->only('nome'));

        return redirect()->route('categ.index')->with('success', 'Categoria atualizada!');
    }

    /**
     * Remove uma categoria do banco de dados.
     * @param Categ $categoria - Renomeado de $categ para $categoria
     */
    public function destroy(Categ $categoria)
    {
        $categoria->delete();
        return redirect()->route('categ.index')->with('success', 'Categoria deletada!');
    }
}