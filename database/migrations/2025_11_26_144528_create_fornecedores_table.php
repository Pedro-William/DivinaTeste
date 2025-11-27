<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cria a tabela 'fornecedores' (plural correto)
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome');
            $table->string('email'); // NOT NULL por padrão
            $table->string('cnpj', 18)->unique(); 
            $table->string('telefone', 20); 
            $table->string('rua');
            $table->string('cidade');
            $table->string('estado', 2);
            $table->string('cep', 10); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
}