<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('imagem')->nullable();
            
            // ✅ CORRIGIDO: Referenciando a tabela 'fornecedores' (plural)
            $table->foreignId('fornecedor_id')->constrained('fornecedores')->onDelete('cascade'); 
            
            $table->text('descricao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->integer('quantidade')->default(0);
            $table->foreignId('subcategoria_id')->constrained('subcategorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}