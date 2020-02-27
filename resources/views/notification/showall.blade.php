@extends('base.nav')

@section('content')
    <h1>Toutes vos notifications </h1>

    @foreach($notifications as $notif)
        <div id="oneNotif" style="left: 2em;">
            <a href="#" style="text-decoration: none;">
                <h3 style="margin: 0">{{$notif->title}}</h3>
                <p style="margin: 0">{{$notif->content}}</p>
                <span style="margin: 0">{{$notif->date}}</span>
            </a>
        </div>
    @endforeach
@endsection
