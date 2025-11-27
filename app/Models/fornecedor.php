<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    // ✅ CORREÇÃO ESSENCIAL: Força o Laravel a procurar pela tabela correta
    protected $table = 'fornecedores'; 
    
    protected $fillable = [
        'nome',
        'email',
        'cnpj', 
        'telefone',
        'rua',
        'cidade',
        'estado',
        'cep'
    ];
    
    // Se a coluna 'numero' da sua migração existir, adicione-a ao $fillable
    // protected $fillable = [
    //     'nome', 'email', 'cnpj', 'telefone', 'rua', 'numero', 'cidade', 'estado', 'cep'
    // ];

}