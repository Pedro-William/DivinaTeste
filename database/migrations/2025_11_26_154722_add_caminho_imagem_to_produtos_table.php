<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Certifique-se de que o nome da classe aqui (ex: AddCaminhoImagemToProdutosTable)
// seja o nome que o Laravel esperava para este arquivo!
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Adiciona a coluna caminho_imagem
            // Usamos string com limite de 2048 para URLs longas e nullable porque é opcional.
            $table->string('caminho_imagem', 2048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('caminho_imagem');
        });
    }
};