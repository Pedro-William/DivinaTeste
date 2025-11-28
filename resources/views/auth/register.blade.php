<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cadastro - Divina Essência</title>
    
    {{-- Conexão CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>
<body class="form-body">
    
    <div class="form-wrapper">
        <h1 class="titulo-cadastro" style="text-align: center;">NOVO CADASTRO</h1>

        {{-- Exibe mensagens de erro de validação do Laravel --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px; text-align: center; border: 1px solid #ffdddd; padding: 10px; background-color: #fffafa;">
                <p style="font-weight: bold; margin-bottom: 5px;">Houve um erro no seu cadastro:</p>
                <ul style="list-style: none; padding: 0;">
                    @foreach($errors->all() as $error)
                        <li>❌ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-container">
            
            {{-- ✅ ACTION e METHOD CORRIGIDOS: POST para route('register') --}}
            <form method="POST" action="{{ route('register') }}" class="cadastro-form">
                @csrf {{-- ✅ TOKEN CSRF OBRIGATÓRIO --}}
                
                <div class="coluna-esquerda">
                    
                    {{-- Nome --}}
                    <div class="campo-grupo">
                        <label for="name">Nome</label>
                        <input type="text" 
                               id="name" 
                               name="name" {{-- ✅ name: 'name' --}}
                               placeholder="DIGITE SEU NOME" 
                               value="{{ old('name') }}"
                               required autofocus>
                    </div>

                    {{-- Sobrenome --}}
                    <div class="campo-grupo">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" 
                               id="sobrenome" 
                               name="sobrenome" {{-- ✅ name: 'sobrenome' --}}
                               placeholder="DIGITE SEU SOBRENOME" 
                               value="{{ old('sobrenome') }}"
                               required>
                    </div>

                    {{-- CPF --}}
                    <div class="campo-grupo">
                        <label for="cpf">CPF</label>
                        <input type="text" 
                               id="cpf" 
                               name="cpf" {{-- ✅ name: 'cpf' --}}
                               placeholder="XXX.XXX.XXX-XX" 
                               pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" 
                               value="{{ old('cpf') }}"
                               required>
                    </div>

                    
                    {{-- Data de nascimento --}}
                    <div class="campo-grupo">
                        <label for="data-nascimento">Data de nascimento</label>
                        <div class="data-nascimento">
                            <select name="dia" id="dia" required> {{-- ✅ name: 'dia' --}}
                                <option value="" disabled {{ old('dia') == '' ? 'selected' : '' }}>DIA</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" {{ old('dia') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="mes" id="mes" required> {{-- ✅ name: 'mes' --}}
                                <option value="" disabled {{ old('mes') == '' ? 'selected' : '' }}>MÊS</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('mes') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="ano" id="ano" required> {{-- ✅ name: 'ano' --}}
                                <option value="" disabled {{ old('ano') == '' ? 'selected' : '' }}>ANO</option>
                                @for ($i = date('Y'); $i >= (date('Y') - 100); $i--)
                                    <option value="{{ $i }}" {{ old('ano') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="coluna-direita">
                    
                    {{-- E-mail --}}
                    <div class="campo-grupo">
                        <label for="email">E-mail</label>
                        <input type="email" 
                               id="email" 
                               name="email" {{-- ✅ name: 'email' --}}
                               placeholder="DIGITE SEU E-MAIL" 
                               value="{{ old('email') }}"
                               required>
                    </div>

                    {{-- Senha --}}
                    <div class="campo-grupo">
                        <label for="password">Senha</label>
                        <div class="input-com-icone">
                            <input type="password" 
                                   id="password" 
                                   name="password" {{-- ✅ name: 'password' --}}
                                   placeholder="DIGITE SUA SENHA" 
                                   required autocomplete="new-password">
                            <i class="fas fa-eye toggle-password" data-target="password"></i> 
                        </div>
                    </div>

                    {{-- Confirma Senha --}}
                    <div class="campo-grupo">
                        <label for="password_confirmation">Confirme sua senha</label>
                        <div class="input-com-icone">
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" {{-- ✅ name: 'password_confirmation' --}}
                                   placeholder="DIGITE SUA SENHA" 
                                   required autocomplete="new-password">
                            <i class="fas fa-eye toggle-password" data-target="password_confirmation"></i> 
                        </div>
                    </div>

                    <div class="opcoes-e-envio align-left-desktop"> 
                        <div class="checkbox-grupo">
                            {{-- Promocionais --}}
                            <input type="checkbox" id="promocionais" name="promocionais" {{ old('promocionais') ? 'checked' : '' }}>
                            <label for="promocionais">Receber e-mails promocionais</label>
                        </div>

                        {{-- Botão de Envio --}}
                        <button type="submit" class="btn-cadastro">Cadastrar</button>

                    </div>
                </div>
            </form>
        </div>
        
        {{-- Link de volta para o Login --}}
        <div style="text-align: center; margin-top: 20px;">
            <p>Já tem uma conta? <a href="{{ route('login') }}" style="color: #A36A00; text-decoration: none;">Acesse sua conta</a></p>
        </div>
    </div>

    {{-- Script para toggle-password (requer JS e FontAwesome CSS) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-password').forEach(icon => {
                icon.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);
                    
                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        targetInput.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                });
            });
        });
    </script>
</body>
</html>