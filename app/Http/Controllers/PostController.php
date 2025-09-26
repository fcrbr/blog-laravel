<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Listar todos os posts
    public function index()
    {
        return response()->json(Post::all());
    }

    // Criar novo post
    public function store(Request $request)
    {
        $post = Post::create($request->only(['title', 'content']));
        return response()->json($post, 201);
    }

    // Mostrar um post específico
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    // Atualizar post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));
        return response()->json($post);
    }

    // Deletar post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}
