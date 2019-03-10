@extends('layouts.app')

@section('content')
    <br />
    <a href="/posts" class="btn btn-primary">Natrag</a>
    <br />    
    <br />
    <h1>{{$post->title}}</h1>       
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Objavljeno: {{$post->created_at}}</small>
    <br /><br />
    @if(Auth::check() && Auth::user()->rola == 'admin')
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Uredi</a><br /><br />
    @endif
    @if(Auth::check() && Auth::user()->rola == 'admin')
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger pull-right" value="Briši">
    </form>
    @endif
@endsection