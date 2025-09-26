{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Autor: {{ $post->user->name ?? 'Anônimo' }}</small>
    
    <div class="mt-3">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Voltar</a>
        @if(auth()->id() === $post->user_id)
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
            </form>
        @endif
    </div>
</div>
@endsection
