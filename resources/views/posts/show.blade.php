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
    @if(Auth::user()->rola == 'admin')
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Uredi</a><br /><br />
    @endif
    @if(Auth::user()->rola == 'admin')
        <a href="/posts/create" class="btn btn-primary">Briši</a><br /><br />
    @endif
@endsection