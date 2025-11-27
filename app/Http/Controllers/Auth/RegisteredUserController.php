<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Exibe a view de registro.
     */
    public function create()
    {
        return view('auth.register'); // Aponta para a view que você criou
    }

    /**
     * Lida com a requisição de registro de entrada.
     */
    public function store(Request $request)
    {
        // 1. Validação dos dados
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:'.User::class, 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            
            
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            
            // ✅ DATA DE NASCIMENTO ATUALIZADA (Removido o 's' de 'dias', 'meses', 'anos')
            'dia' => ['required', 'integer', 'min:1', 'max:31'], 
            'mes' => ['required', 'integer', 'min:1', 'max:12'],
            'ano' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // --- Processamento dos dados de Data de Nascimento ---
        try {
            // A variável é construída com os nomes dos campos sem 's'
            $data_nascimento_str = sprintf('%s-%s-%s', $request->ano, $request->mes, $request->dia);
            $data_nascimento = date('Y-m-d', strtotime($data_nascimento_str));
        } catch (\Exception $e) {
             return back()->withErrors(['data_nascimento' => 'A data de nascimento fornecida é inválida.'])->withInput();
        }
        
        // 2. Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'sobrenome' => $request->sobrenome, 
            'cpf' => $request->cpf, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
            'data_nascimento' => $data_nascimento,
            'receber_promocionais' => $request->has('promocionais'),
        ]);

        // 3. Login automático
        Auth::login($user);

        // 4. Redirecionamento para o Painel
        return redirect()->intended(route('painel', absolute: false));
    }
}