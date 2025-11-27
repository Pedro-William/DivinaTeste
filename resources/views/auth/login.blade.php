<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Acesso</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/organisms/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>
<body class="form-body">

    <div class="form-container" style="max-width: 400px; padding: 40px;">

        <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo" style="display: block; margin: 0 auto 20px; max-width: 100px;">
        <h1 class="login-title" style="text-align: center;">Login</h1>

        {{-- Exibe mensagens de erro de validação do Laravel --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="cadastro-form" method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" 
                       id="email" 
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Seu endereço de e-mail" 
                       required 
                       autofocus>
            </div>

            {{-- Senha --}}
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="Sua senha"
                       required 
                       autocomplete="current-password">
            </div>
            
            {{-- Lembre-me --}}
            <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; margin-top: 15px;">
                <label for="remember_me" style="display: flex; align-items: center; cursor: pointer;">
                    <input id="remember_me" type="checkbox" name="remember" style="margin-right: 8px;">
                    <span>Lembrar-me</span>
                </label>
            </div>

            <button type="submit" class="btn-confirmar" style="width: 100%; margin-top: 20px;">
                Entrar
            </button>
            
            <div class="form-links" style="text-align: center; margin-top: 15px;">
                <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></p>
                
                {{-- Opcional: Link para "Esqueceu a senha?" --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none; display: block; margin-top: 5px;">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>
        </form>

    </div>
</body>
</html>
















