<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Identificador único do produto
            $table->string('name'); // Nome da flor ou arranjo
            $table->text('description')->nullable(); // Descrição do produto
            $table->decimal('price', 8, 2); // Preço do produto
            $table->integer('stock')->default(0); // Estoque disponível
            $table->string('color')->nullable(); // Cor da flor
            $table->string('size')->nullable(); // Tamanho da flor ou arranjo (pequeno, médio, grande)
            $table->string('image')->nullable(); // Caminho da imagem do produto
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Categoria do produto
            $table->timestamps(); // Campos de criação e atualização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

