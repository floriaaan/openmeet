@extends('layouts.nav')

@section('content')

    <div class="container-fluid">
        <form action="/events/create" method="POST">
            @csrf
            <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
                <div class="row no-gutters">
                    <div class="col-md-4 m-auto p-2">
                        adresse
                        +
                        date

                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <h2 class="display-4 mb-1" id="title-group"></h2>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <input class="form-control form-control-lg @error('eName') is-invalid @enderror"
                                       name="eName" type="text" value="{{ old('eName') }}"
                                       placeholder="Nom de l'événement"
                                       required id="title-input">
                            </div>
                            <hr class="mx-4 my-4">

                            <textarea class="form-control @error('eDesc') is-invalid @enderror desc"
                                      name="eDesc" rows="8"
                                      placeholder="Description du groupe">{{ old('eDesc') }}</textarea>

                            <hr class="mx-4 my-4">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input class="form-control @error('eDateFrom') is-invalid @enderror"
                                       name="eDateFrom" type="date" value="{{ old('eDateFrom') }}"
                                       required>
                            </div>

                            <div class="input-group mt-1">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Organisateur</span>
                                </div>
                                <select class="form-control" name="eGroup">
                                    @foreach($listGroup as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mb-4 mr-3">
                            Créer un événement
                        </button>
                    </div>
                </div>

            </div>

        </form>
    </div>

@endsection

@section('js')

    <script>
        $(function () {
            console.log($('#title-group').text());
            $('#title-input').keyup(function () {
                let input = $('#title-input').val();
                $('#title-group').text(input);
            })
        })
    </script>
@endsection
