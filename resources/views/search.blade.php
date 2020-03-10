@extends('layouts.nav')

@section('content')


    <div class="container-fluid p-5">
        <div class="card-columns">

            @foreach($searchQuery as $search)
                <div class="card rounded shadow-sm">


                </div>

            @endforeach


        </div>
    </div>

@endsection
