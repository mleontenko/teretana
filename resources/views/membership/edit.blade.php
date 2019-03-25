@extends('layouts.app')

@section('content')
<div class="card">
        <h2 class="card-header text-center">Produljenje članarine</h2>
        <div class="card-body">
            <form action="{{ route('membership.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="clanarina">Članarina traje do:</label>
                    <input type="date" name="clanarina" value="{{$user->clanarina}}">
                </div>
                <input type="submit" class="btn btn-primary" value="Potvrdi">
            </form>
        </div>
</div>
@endsection