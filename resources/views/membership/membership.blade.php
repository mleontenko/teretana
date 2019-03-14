@extends('layouts.app')

@section('content')
    <br />
    <h2>Popis članova</h2> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime i prezime</th>
                <th scope="col">email</th>
                <th scope="col">Newsletter pretplata</th>
                <th scope="col">Članarina vrijedi do</th>
                <th scope="col">Produži članarinu</th>
            </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->email}}</td>
            <td>
                @if($member->newsletter == FALSE)
                    NE                
                @else
                    DA
                @endif
            </td>
            <td>{{$member->clanarina}}</td>  
            <td>
                <a href="/membership/{{$member->id}}/edit" class="btn btn-primary">Produži članarinu</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection