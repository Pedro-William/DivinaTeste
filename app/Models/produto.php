<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'fornecedor_id',
        'subcategoria_id',
        'descricao',
        'valor',
        'quantidade',
        'caminho_imagem', // ✅ Campo de imagem
    ];

    /**
     * Relacionamento: Produto pertence a um Fornecedor.
     */
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    /**
     * Relacionamento: Produto pertence a uma Subcategoria.
     */
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}