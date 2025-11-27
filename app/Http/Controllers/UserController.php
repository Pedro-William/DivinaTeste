<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // ... outros métodos (opcional: show, edit)

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        // 1. Validação dos Dados Pessoais
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            // O e-mail deve ser único, exceto para o usuário atual
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        // 2. Validação e Lógica da Senha
        if ($request->filled('current_password') || $request->filled('new_password')) {
            $request->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('A senha atual fornecida está incorreta.');
                    }
                }],
                'new_password' => 'required|string|min:8|confirmed', // 'confirmed' procura por 'new_password_confirmation'
            ], [
                'new_password.confirmed' => 'A confirmação da nova senha não corresponde.',
            ]);
            
            // Se a senha for válida, atualiza
            $validatedData['password'] = Hash::make($request->new_password);
        }
        
        // 3. Validação e Lógica do Endereço
        // NOTA: Se você tiver uma tabela 'addresses', você deve usar um Controller/Model de endereço aqui.
        // Para simplificar, vou assumir que você tem campos de endereço no Model User (não recomendado em produção).
        $request->validate([
            'cep' => 'nullable|string|max:9',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
        ]);
        
        // 4. Combina os dados validados com os dados de endereço (temporariamente)
        $updateData = array_merge($validatedData, [
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);
        
        // 5. Salva as alterações no usuário
        $user->update($updateData);

        // 6. Redirecionamento
        return redirect()->route('minhaconta')->with('status', 'Perfil atualizado com sucesso!');
    }
}