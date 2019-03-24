@extends('layouts.app')

@section('content')
    <br />
    <h3>Vijesti</h3> 
        @if(Auth::check() && Auth::user()->rola == 'admin')
            <a href="/posts/create" class="btn btn-primary">Dodaj novi</a><br /><br />
        @endif
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Objavljeno: {{$post->created_at}}</small>
                    </div>
                </div>
                <br />
            @endforeach
            {{$posts->links()}}
        @else
            <p>Nema vijesti.</p>
        @endif
@endsection