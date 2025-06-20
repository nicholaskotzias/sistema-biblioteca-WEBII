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
        Schema::create('exemplares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            $table->string('codigo_exemplar')->unique();
            $table->enum('status', ['DISPONIVEL', 'EMPRESTADO', 'DANIFICADO', 'PERDIDO'])->default('DISPONIVEL');
            $table->string('localizacao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exemplares');
    }
};
