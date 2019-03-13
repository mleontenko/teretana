@extends('layouts.app')

@section('content')
    <br />
    <h1>Produljenje članarine</h1>
    <form action="{{ route('membership.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="clanarina">Članarina traje do:</label>
            <input type="date" name="clanarina" value="{{$user->clanarina}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Potvrdi">
    </form>
@endsection