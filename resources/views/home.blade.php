@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br />
            <div class="card">                
                <div class="card-header">Profil korisnika</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Korisnik: {{ Auth::user()->name }}</p>
                    <span>Članarina vrijedi do: 
                        @if (Auth::user()->clanarina < date("Y-m-d"))
                            <div class="alert alert-danger" role="alert">
                                {{Auth::user()->clanarina}}
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                {{Auth::user()->clanarina}}
                            </div>
                        @endif
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
