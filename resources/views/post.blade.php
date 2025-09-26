@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">Publicado em {{ $post->created_at->format('d/m/Y H:i') }}</p>
    <div>
        {{ $post->content }}
    </div>
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
