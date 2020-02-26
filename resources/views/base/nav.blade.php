@extends('base.index')

@section('body')

    <nav class="navbar">

        <a class="navbar-brand" href="/">
            <img src="/assets/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="{{ config('openmeet.name') }}">
            <h1 class="openmeet-title text-center openmeet-color">{{ config('openmeet.name') }}</h1>
        </a>
    </nav>

@endsection
