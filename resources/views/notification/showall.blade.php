@extends('base.nav')

@section('content')
    <h1>Toutes vos notifications </h1>

    @foreach($notifications as $notif)
        <a href="#">
            <h3>{{$notif->NOTIF_TITLE}}</h3>
            <p>{{$notif->NOTIF_CONTENT}}</p>
            <span>{{$notif->NOTIF_DATE}}</span>
        </a>
    @endforeach
@endsection
