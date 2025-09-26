<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    /**
     * Listar todos os posts com os respectivos usuários.
     */
    public function index()
    {
        return response()->json(
            Post::with('user')->latest()->get()
        );
    }

    /**
     * Criar novo post (o user_id vem do usuário autenticado).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'author'  => 'nullable|string|max:255',
        ]);

        $post = Post::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'author'  => $validated['author'] ?? null,
            'slug'    => Str::slug($validated['title']),
            'user_id' => $request->user()->id,
        ]);

        return response()->json($post, 201);
    }

    /**
     * Exibir um post específico.
     */
    public function show(Post $post)
    {
        return response()->json($post->load('user'));
    }

    /**
     * Atualizar post (somente se for dono).
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title'   => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'author'  => 'nullable|string|max:255',
        ]);

        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $post->update($validated);

        return response()->json($post);
    }

    /**
     * Deletar post (somente se for dono).
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json(['message' => 'Post deletado com sucesso']);
    }
}
