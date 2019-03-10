@extends('layouts.app')

@section('content')
    <br />
    <h1>Treninzi</h1> 
        @if(Auth::user()->trening == NULL)
            <p>Nemate upisan trening</p>
        @elseif(Auth::user()->trening != NULL)
            <p>Upisali ste trening: {{$odabraniTrening->naziv}}</p>
            <form action="{{ route('trainings.destroy', [Auth::user()->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Ispiši">                        
            </form>
        @endif

        <br /><br />

        @if(count($trainings) > 0)
            @foreach($trainings as $training)
                <div class="card">
                <h3>{{$training->naziv}}</h3>
                <p>Termin: {{$training->termin}}</p>
                <p>Trener: {{$training->trener}}</p>
                <form action="{{ route('trainings.update', [Auth::user()->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input name="trening_id" value="{{$training->id}}" type="hidden">
                    <input type="submit" class="btn btn-primary" value="Upiši">                        
                </form>                
                </div>
                <br />
            @endforeach
        @else
            <p>Nema definiranih treninga.</p>
        @endif
@endsection