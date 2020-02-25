@extends('index')

@section('titre')
    OpenMeet - Installation
@endsection

@section('body')
    <div class="container">
        <div class="text-center">
            <form method="post" action="{{ url('Install') }}"></form>
            @csrf
            <div class="form-group">
                <label for="iName">Nom du site</label>
                <input type="email" class="form-control" id="iName" name="iName" placeholder="OpenMeet">
            </div>
        </div>
    </div>
@endsection
