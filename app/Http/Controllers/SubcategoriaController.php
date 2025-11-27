<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categ; // Modelo para Categoria Principal
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Lista todas as subcategorias, aplicando filtro de pesquisa e paginação.
     */
    public function index(Request $request)
    {
        // 1. Obtém o termo de pesquisa da requisição
        $search = $request->input('search');

        // 2. Inicia a query carregando o relacionamento com Categoria ('categoria' no modelo Subcategoria)
        $query = Subcategoria::with('categoria'); 

        // 3. Aplica o filtro se houver um termo de pesquisa
        if ($search) {
            $query->where('nome', 'LIKE', '%' . $search . '%')
                  // Opcional: Filtra por nome da categoria relacionada (usando a relação 'categoria')
                  ->orWhereHas('categoria', function ($q) use ($search) {
                      $q->where('nome', 'LIKE', '%' . $search . '%');
                  });
        }

        // 4. Obtém os resultados com paginação (15 itens por página)
        $subcategorias = $query->paginate(15);
        
        // Mantém o parâmetro de busca na paginação
        $subcategorias->appends(['search' => $search]);

        return view('subcategoria.index', compact('subcategorias'));
    }

    public function create()
    {
        return view('subcategoria.create', [
            // Renomeei a variável para $categorias para consistência, já que o modelo é Categ
            'categorias' => Categ::all() 
        ]);
    }

    /**
     * Armazena uma nova subcategoria com validação e mensagem de sucesso.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:subcategorias,nome',
            // ✅ CORRIGIDO: Usando 'categoria_id' que é o nome do campo na view
            'categoria_id' => 'required|exists:categs,id', 
        ]);

        Subcategoria::create($request->all());
        
        return redirect()->route('subcategoria.index')->with('success', 'Subcategoria criada com sucesso!');
    }

    public function show(Subcategoria $subcategoria)
    {
        // Carrega a categoria para a view de visualização
        $subcategoria->load('categoria'); 
        return view('subcategoria.show', ['subcategoria' => $subcategoria]);
    }

    public function edit(Subcategoria $subcategoria)
    {
        return view('subcategoria.edit', [
            'subcategoria' => $subcategoria,
            'categorias' => Categ::all() // Passando todas as categorias
        ]);
    }

    /**
     * Atualiza a subcategoria com validação e mensagem de sucesso.
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            // Exclui a subcategoria atual da verificação de unicidade
            'nome' => 'required|string|max:255|unique:subcategorias,nome,' . $subcategoria->id, 
            // ✅ CORRIGIDO: Usando 'categoria_id' que é o nome do campo na view
            'categoria_id' => 'required|exists:categs,id', 
        ]);

        $subcategoria->update($request->all());
        
        return redirect()->route('subcategoria.index')->with('success', 'Subcategoria atualizada com sucesso!');
    }

    /**
     * Exclui a subcategoria com mensagem de sucesso.
     */
    public function destroy(Subcategoria $subcategoria)
    {
        try {
            $subcategoria->delete();
            return redirect()->route('subcategoria.index')->with('success', 'Subcategoria excluída com sucesso!');
        } catch (\Exception $e) {
            // Se houver restrições (ex: produtos ligados a ela), avisa o usuário.
            return redirect()->route('subcategoria.index')->with('error', 'Erro ao excluir subcategoria. Verifique se há produtos vinculados.');
        }
    }
}