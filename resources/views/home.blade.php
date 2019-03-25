@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br />
            <div class="card">                
                <h2 class="card-header">Profil korisnika</h2>

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
                    <br /><br />
                    <form action="{{ route('themes.update', [Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn btn-primary" value="Promijeni temu">                        
                    </form>
                    <br /><br />
                    @if(Auth::user()->newsletter == FALSE)
                    <p>Niste pretplaćeni na newsletter</p>
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value={{Auth::user()->id}} name="id">
                        <input type="submit" class="btn btn-primary" value="Pretplati se">                        
                    </form>
                    @elseif(Auth::user()->newsletter == TRUE)
                    <p>Pretplaćeni ste na newsletter</p>
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value={{Auth::user()->id}} name="id">
                        <input type="submit" class="btn btn-danger" value="Otkaži">                        
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
