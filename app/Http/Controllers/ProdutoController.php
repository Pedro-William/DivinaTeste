<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos, aplicando filtro de pesquisa e paginação.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Produto::with(['fornecedor', 'subcategoria']);

        if ($search) {
            $query->where('nome', 'LIKE', '%' . $search . '%')
            ->orWhereHas('fornecedor', function ($q) use ($search) {
                $q->where('nome', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('subcategoria', function ($q) use ($search) {
                $q->where('nome', 'LIKE', '%' . $search . '%');
            });
        }

        $produtos = $query->paginate(15);
        
        $produtos->appends(['search' => $search]);

        return view('produto.index', compact('produtos'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $subcategorias = Subcategoria::all();
        return view('produto.create', compact('fornecedores', 'subcategorias'));
    }

    /**
     * Armazena um novo produto. (Priorizando URL externa)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'imagem_url' => 'nullable|url|max:2048', 
            'imagem_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'fornecedor_id' => 'required|exists:fornecedores,id', 
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'nome', 'fornecedor_id', 'subcategoria_id', 'descricao', 'valor', 'quantidade'
        ]);
        
        // Lógica de Prioridade: 1. URL externa, 2. Upload de Arquivo local
        if ($request->filled('imagem_url')) {
            $data['caminho_imagem'] = $request->imagem_url;
        } elseif ($request->hasFile('imagem_file')) {
            $caminho_imagem = $request->file('imagem_file')->store('produtos_images', 'public');
            $data['caminho_imagem'] = $caminho_imagem;
        } else {
             $data['caminho_imagem'] = null;
        }

        Produto::create($data);

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Exibe detalhes de um produto.
     */
    public function show(Produto $produto)
    {
        $produto->load('fornecedor', 'subcategoria');
        return view('produto.show', compact('produto'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $subcategorias = Subcategoria::all();
        return view('produto.edit', compact('produto', 'fornecedores', 'subcategorias'));
    }

    /**
     * Atualiza o produto. (Priorizando URL externa)
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'imagem_url' => 'nullable|url|max:2048', 
            'imagem_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'fornecedor_id' => 'required|exists:fornecedores,id', 
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
        ]);

        $data = $request->only([
            'nome', 'fornecedor_id', 'subcategoria_id', 'descricao', 'valor', 'quantidade'
        ]);

        $old_caminho = $produto->caminho_imagem;

        $delete_old_image = function () use ($old_caminho) {
            if ($old_caminho && !filter_var($old_caminho, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($old_caminho);
            }
        };

        if ($request->filled('imagem_url')) {
            $delete_old_image();
            $data['caminho_imagem'] = $request->imagem_url;
        } elseif ($request->hasFile('imagem_file')) {
            $delete_old_image();
            $caminho_imagem = $request->file('imagem_file')->store('produtos_images', 'public');
            $data['caminho_imagem'] = $caminho_imagem;
        } elseif ($request->imagem_url === null && $request->has('imagem_url') && !$request->hasFile('imagem_file')) {
            $delete_old_image();
            $data['caminho_imagem'] = null;
        } else {
            $data['caminho_imagem'] = $old_caminho;
        }

        $produto->update($data);

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Excluir produto. 
     */
    public function destroy(Produto $produto)
    {
        if ($produto->caminho_imagem && !filter_var($produto->caminho_imagem, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($produto->caminho_imagem);
        }
        
        $produto->delete();
        return redirect()->route('produto.index')->with('success', 'Produto excluído com sucesso!');
    }
}