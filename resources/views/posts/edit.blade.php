@extends('layouts.app')

@section('content')
    <br />
    <h1>Uredi vijest</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" rows="3" name="body" >{{$post->body}}</textarea>
    </div>
    <input type="submit" class="btn btn-primary">
</form>

@endsection