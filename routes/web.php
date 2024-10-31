<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // Importando o ProductController
use App\Http\Controllers\CategoryController; // Importando o CategoryController
use Illuminate\Support\Facades\Route;

// Rota para a home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rota para o dashboard, protegido por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas para gerenciamento de produtos
Route::resource('products', ProductController::class)->middleware(['auth']);

// Rotas para gerenciamento de categorias
Route::resource('categories', CategoryController::class)->middleware(['auth']);

// Rotas para o perfil do usuário, protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
