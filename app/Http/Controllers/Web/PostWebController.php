<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // protege todas as rotas do CRUD
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author'  => 'nullable|string|max:255',
        ]);

	         // Gerar slug único
	    $slugBase = Str::slug($validated['title']);
	    $slug = $slugBase;
	    $count = Post::where('slug', 'like', "{$slugBase}%")->count();
	    if ($count > 0) {
	        $slug .= '-' . ($count + 1);
	    }	

        /* $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => \Illuminate\Support\Str::slug($request->title),
            'user_id' => $request->user()->id,
        ]);
       */

         $post = Post::create([
        'title'   => $validated['title'],
        'content' => $validated['content'],
        'author'  => $validated['author'] ?? null,
        'slug'    => $slug,
        'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => \Illuminate\Support\Str::slug($request->title),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
