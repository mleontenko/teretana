@extends('layouts.app')

@section('content')
    <br />
    <h3>{{$user->name}}</h3> 
    <br />
    <p>ID: {{$user->id}}</p>
    <p>email: {{$user->email}}</p>
    <p>Datum registracije: {{$user->created_at}}</p>
    <p>Članarina vrijedi do: {{$user->clanarina}}</p>
    @if($user->trening_naziv != NULL)
        <p>Odabran trening: {{$user->trening_naziv->naziv}}</p>
        <p>Termin: {{$user->trening_naziv->termin}}</p> 
        <p>Trener: {{$user->trening_naziv->trener}}</p> 
    @else
        <p>Nema odabranog treninga.</p>
    @endif
    @if($user->newsletter == TRUE)
        <p>Korisnik je pretplaćen na newsletter.</p>
    @else
        <p>Korisnik nije pretplaćen na newsletter.</p>
    @endif
    <a href="/membership/{{$user->id}}/edit" class="btn btn-primary">Produži članarinu</a>
@endsection