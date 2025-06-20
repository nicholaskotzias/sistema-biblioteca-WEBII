<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->foreignId('exemplar_id')->constrained('exemplares')->onDelete('cascade');
            $table->date('data_emprestimo')->default(DB::raw('CURRENT_DATE'));
            $table->date('data_devolucao_prevista');
            $table->date('data_devolucao_real')->nullable();
            $table->enum('status', ['PENDENTE', 'APROVADO', 'DEVOLVIDO', 'ATRASADO']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
