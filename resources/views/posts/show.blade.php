@extends('layouts.app')

@section('content')
    
    <div class="card">
        <h2 class="card-header">{{$post->title}}</h2>
        <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
            <p>Objavljeno: {{$post->created_at}}</p>
            <p>Autor: {{$post->korisnik_ime->name}}</p>
            <a href="/posts" class="btn btn-primary">Natrag</a>
            @if(Auth::check() && Auth::user()->rola == 'admin')
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Uredi</a>
            @endif
            @if(Auth::check() && Auth::user()->rola == 'admin')
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
                    <input type="submit" class="btn btn-danger marg10" value="Briši">
                </form>
            @endif
        </div>
    </div>
@endsection