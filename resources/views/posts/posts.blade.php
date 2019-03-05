@extends('layouts.app')

@section('content')
    <br />
    <h1>Posts</h1>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Objavljeno: {{$post->created_at}}</small>
                </div>
            @endforeach
            {{$posts->links()}}
        @else
            <p>Nema vijesti.</p>
        @endif
@endsection