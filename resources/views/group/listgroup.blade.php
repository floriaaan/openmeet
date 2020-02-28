@extends('layouts.nav')

@section('content')
    <h1>Tout vos Groupes </h1>

    @foreach($Groups as $group)
        <div id="oneGroup" style="left: 2em;">
            <a href="" style="text-decoration: none;">
                <h3 style="margin: 0">{{$group->name}}</h3>
                <span style="margin: 0">{{$group->picrepo}}</span>
            </a>
        </div>
    @endforeach
@endsection
