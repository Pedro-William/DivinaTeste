<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Campos que você adicionou
            $table->string('sobrenome')->nullable()->after('name');
            $table->string('cpf', 14)->unique()->nullable()->after('sobrenome');
            $table->string('contato', 15)->nullable()->after('cpf');
            $table->date('data_nascimento')->nullable()->after('contato');
            $table->boolean('receber_promocionais')->default(false)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverte a ação, removendo as colunas
            $table->dropColumn(['sobrenome', 'cpf', 'contato', 'data_nascimento', 'receber_promocionais']);
        });
    }
};