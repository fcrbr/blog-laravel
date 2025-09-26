{{-- resources/views/posts/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Novo Post</a>

    <div class="list-group">
        @foreach ($posts as $post)
            <div class="list-group-item">
                <h4>{{ $post->title }}</h4>
                <p>{{ Str::limit($post->content, 150) }}</p>
                <small>Autor: {{ $post->user->name ?? 'Anônimo' }}</small>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
</div>
@endsection
