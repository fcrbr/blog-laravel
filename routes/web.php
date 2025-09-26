<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\PostWebController;

// Página inicial (pública) mostrando os posts mais recentes
Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('home', compact('posts'));
})->name('home');

// Rotas de autenticação
Route::get('/register', [AuthWebController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthWebController::class, 'register'])->name('register');

Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthWebController::class, 'login'])->name('login');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

// Grupo de rotas protegidas (somente logados)
Route::middleware('auth')->group(function () {
    //Route::resource('posts', PostWebController::class)->except(['index', 'show']);

    Route::get('/posts', [PostWebController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostWebController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostWebController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostWebController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostWebController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostWebController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostWebController::class, 'show'])->name('posts.show');
});

/* Rota pública para exibir post individual
Route::get('/posts/{id}', function ($id) {
    $post = Post::findOrFail($id);
    return view('post', compact('post'));
})->name('posts.show');
*/
Route::get('/posts/{post:slug}', [PostWebController::class, 'show'])->name('posts.show');
