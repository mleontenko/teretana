@extends('layouts.app')

@section('content')
<div class="card">
    <h1 class="card-header text-center">Ormarići</h1>
        <div class="card-body">
        @if($selectedLocker != NULL)
            <p class>Odabrali ste ormarić: {{$selectedLocker->id}}</p>
            <form action="{{ route('lockers.destroy', [Auth::user()->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Oslobodi ormarić">                        
            </form>
        @else
            <p>Niste odabrali ormarić.</p>
        @endif
        <br/>
        @if(count($lockers) > 0)
            <form action="{{ route('lockers.update', [Auth::user()->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="lockerSelector">Slobodni ormarići:</label>
            <select class="form-control" id="lockerSelector" name="locker_id">
            @foreach($lockers as $locker)
                <option value="{{$locker->id}}">{{$locker->id}}</option>
            @endforeach
            </select>
            <br />
            <input type="submit" class="btn btn-primary" value="Rezerviraj">                        
            </form>
        @else
            <p>Nema slobodnih ormarića.</p>
        @endif
        </div>
</div>
    
@endsection