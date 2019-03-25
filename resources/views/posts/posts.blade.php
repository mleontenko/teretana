@extends('layouts.app')

@section('content')

    <div class="card">
        <h1 class="card-header text-center">Obavijesti</h1>
        @if(Auth::check() && Auth::user()->rola == 'admin')
            <div class="card-body"><a href="/posts/create" class="btn btn-primary">Dodaj novu vijest</a></div>
        @endif
    </div>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                </div>
                <div class="card-footer text-muted">
                <p>Objavljeno: {{$post->created_at}}</p>
                </div>
            </div>
            <br />
        @endforeach
        {{$posts->links()}}
    @else
        <div class="card">
            <div class="card-body">
                <p>Nema vijesti.</p>
            </div>
        </div>      
    @endif
@endsection