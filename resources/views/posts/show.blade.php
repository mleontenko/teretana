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
@endsection