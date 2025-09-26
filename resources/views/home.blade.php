{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Posts</h1>

    {{-- Apenas usuários logados podem criar posts --}}
    @auth
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Novo Post</a>
    @endauth

    @if ($posts->isEmpty())
        <p>Nenhum post cadastrado ainda.</p>
    @else
        <div class="list-group">
            @foreach ($posts as $post)
                <div class="list-group-item">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                    <small>
                        Autor: {{ $post->user->name ?? 'Anônimo' }} |
                        Publicado em: {{ $post->created_at->format('d/m/Y H:i') }}
                    </small>

                    <div class="mt-2">
                        <!--<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-secondary">-->
                         <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-secondary">Ver</a>

                         

                        {{-- Se for o dono, mostra os botões --}}
                        @auth
                            @if (auth()->id() === $post->user_id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir este post?')">
                                        Excluir
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
