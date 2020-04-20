@extends('layouts.nav')

@section('title')
    Edit Pages
@endsection

@section('content')
    Expected parameters : $home, $mail
    <hr>
    {{var_dump($home)}}
    <hr>
    {{var_dump($mail)}}
@endsection


