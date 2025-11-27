<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $fillable = ['nome', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categ::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
