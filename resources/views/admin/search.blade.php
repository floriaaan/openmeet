@extends('layouts.nav')

@section('title')
    Super-Search
@endsection

@section('content')
    Expected parameters : $search, $results
    <hr>
    {{var_dump($search)}}
    <hr>
    {{var_dump($results)}}

@endsection
