<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request) 
    {
        // 1. Obtém o termo de pesquisa (search) da URL.
        $search = $request->input('search');

        // 2. Inicializa a query do modelo Admin
        $query = Admin::query();
        
        // 3. Aplica o filtro se houver um termo de pesquisa
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%'); // Pesquisa por nome OU email
        }

        // 4. Usa paginate() para habilitar a paginação (10 itens por página)
        $allAdmin = $query->paginate(10); 
        
        // 5. Retorna a view com os dados
        return view('admin.index', compact('allAdmin'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Administrador criado!');
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('success', 'Administrador atualizado!');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Administrador excluído!');
    }

    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }
}