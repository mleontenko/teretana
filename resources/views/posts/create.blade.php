@extends('layouts.app')

@section('content')
    <br />
    <h1>Nova vijest</h1>
    <form action="{{ route('posts.store') }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="title">Naslov</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Sadržaj</label>
            <textarea class="form-control" id="body" rows="3" name="body"></textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection