@extends('layouts.nav')

@section('content')
    <h1>Tout vos Evenements </h1>

    @foreach($Evenements as $Event)
        <div id="oneEvent" style="left: 2em;">
            <a href="" style="text-decoration: none;">
                <h3 style="margin: 0">{{$Event->name}}</h3>
                <p style="margin: 0">{{$Event->description}}</p>
                <span style="margin: 0">{{$Event->country}}</span>
                <span style="margin: 0">{{$Event->city}}</span>
                <span style="margin: 0">{{$Event->numstreet}}</span>
                <span style="margin: 0">{{$Event->street}}</span>
                <span style="margin: 0">{{$Event->zip}}</span>
                <span style="margin: 0">{{$Event->datefrom}}</span>
                <span style="margin: 0">{{$Event->dateto}}</span>
            </a>
        </div>
    @endforeach
@endsection
