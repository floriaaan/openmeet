@extends('layouts.nav')

@section('title')
    Alerts
@endsection

@section('content')
    Expected parameters : $alerts
    <hr>
    {{var_dump($alerts)}}
@endsection
