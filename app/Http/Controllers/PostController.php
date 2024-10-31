<?php

namespace App\Http\Controllers;

use App\Models\Post; // Importando o modelo Post
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todos os posts do banco de dados
        $posts = Post::all();
        return view('posts.index', compact('posts')); // Retorna a view com a lista de posts
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create'); // Retorna a view para criar um novo post
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', // A chave estrangeira deve existir na tabela categories
        ]);

        // Cria um novo post no banco de dados
        Post::create($validated);

        // Redireciona para a lista de posts com uma mensagem de sucesso
        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca um post específico pelo ID
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post')); // Retorna a view para exibir o post
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca o post específico pelo ID
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post')); // Retorna a view para editar o post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', // A chave estrangeira deve existir na tabela categories
        ]);

        // Busca o post específico pelo ID e atualiza seus dados
        $post = Post::findOrFail($id);
        $post->update($validated);

        // Redireciona para a lista de posts com uma mensagem de sucesso
        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca o post específico pelo ID e o deleta
        $post = Post::findOrFail($id);
        $post->delete();

        // Redireciona para a lista de posts com uma mensagem de sucesso
        return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso!');
    }
}
