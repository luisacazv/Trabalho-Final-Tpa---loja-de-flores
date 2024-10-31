<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importando o modelo Product
use Illuminate\Http\Request;
use App\Models\Category; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna uma lista de produtos
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obter todas as categorias
        $categories = Category::all();

        // Retorna a view para criar um novo produto com as categorias
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Criar o produto
        $product = Product::create($request->all());
    
        // Lidar com o upload da imagem
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName; // Salvar o nome da imagem no produto
            $product->save();
        }
    
        // Redirecionar após a criação
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
    }





    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Retorna a view para mostrar um produto específico
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Obter todas as categorias para o formulário de edição
        $categories = Category::all();
        
        // Retorna a view para editar um produto específico
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    // Validação dos dados
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer',
        'color' => 'nullable|string',
        'size' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Se você estiver permitindo upload de imagens
    ]);

    // Atualização dos campos do produto
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->stock = $request->input('stock');
    $product->color = $request->input('color');
    $product->size = $request->input('size');

    // Lidar com a imagem, se houver uma nova
    if ($request->hasFile('image')) {
        // Excluir a imagem antiga, se necessário
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Armazenar a nova imagem
        $path = $request->file('image')->store('images', 'public');
        $product->image = $path;
    }

    // Salvar as alterações
    $product->save();

    return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Remove o produto
        $product->delete();

        // Redirecionar após a exclusão
        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso.');
    }
}
