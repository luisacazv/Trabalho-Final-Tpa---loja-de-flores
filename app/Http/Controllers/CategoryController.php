<?php

namespace App\Http\Controllers;

use App\Models\Category; // Importando o modelo Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todas as categorias do banco de dados
        $categories = Category::all();
        return view('categories.index', compact('categories')); // Retorna a view com a lista de categorias
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create'); // Retorna a view para criar uma nova categoria
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name', // O nome deve ser único
        ]);

        // Cria uma nova categoria no banco de dados
        Category::create($validated);

        // Redireciona para a lista de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca uma categoria específica pelo ID
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category')); // Retorna a view para exibir a categoria
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca a categoria específica pelo ID
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category')); // Retorna a view para editar a categoria
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id, // O nome deve ser único, exceto para a categoria em edição
        ]);

        // Busca a categoria específica pelo ID e atualiza seus dados
        $category = Category::findOrFail($id);
        $category->update($validated);

        // Redireciona para a lista de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca a categoria específica pelo ID e a deleta
        $category = Category::findOrFail($id);
        $category->delete();

        // Redireciona para a lista de categorias com uma mensagem de sucesso
        return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
    }
}
