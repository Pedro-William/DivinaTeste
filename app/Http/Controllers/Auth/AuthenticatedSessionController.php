<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException; // Necessário para lidar com erros de login
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Exibe a view de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Lida com a requisição de autenticação e define o redirecionamento.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validação dos campos
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Tenta autenticar o usuário manualmente com Auth::attempt()
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            // Se a autenticação falhar, lança exceção com mensagem de erro
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Mensagem de falha no login
            ]);
        }
        
        // 3. Regenera a sessão (Só alcança aqui se a autenticação for bem-sucedida)
        $request->session()->regenerate();

        // 4. Lógica de Redirecionamento Personalizada (@admin ou home)
        $user = Auth::user();
        
        // Verifica se o e-mail contém "@admin"
        if (str_contains($user->email, '@admin')) {
            // Se for admin, redireciona para o Painel Administrativo
            return redirect()->intended(route('painel', absolute: false));
        } else {
            // Se não for admin, redireciona para a página principal (home do app)
            return redirect()->intended(route('home', absolute: false));
        }
    }

    /**
     * Destrói a sessão (Logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 1. Faz o logout
        Auth::guard('web')->logout();

        // 2. Invalida a sessão e regenera o token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. Redireciona para a tela inicial
        return redirect('/'); 
    }
}