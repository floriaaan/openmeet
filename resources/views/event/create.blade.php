@extends('layouts.nav')

@section('title')
    Créer un événement
@endsection

@section('content')

    <div class="container-fluid">
        <form action="/events/create" method="POST">
            @csrf
            <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
                <div class="row no-gutters">

                    <div class="col-md-7">
                        <div class="card-body p-4">
                            <h2 class="display-4 mb-1" id="title-group"></h2>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <input class="form-control form-control-lg @error('eName') is-invalid @enderror"
                                       name="eName" type="text" value="{{ old('eName') }}"
                                       placeholder="Nom de l'événement"
                                       required id="title-input">
                                @error('eName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr class="mx-4 my-4">

                            <textarea class="form-control @error('eDesc') is-invalid @enderror desc"
                                      name="eDesc" rows="8"
                                      placeholder="Description du groupe">{{ old('eDesc') }}</textarea>
                            @error('eDesc')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <hr class="mx-4 my-4">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input class="form-control @error('eDateFrom') is-invalid @enderror"
                                       name="eDateFrom" type="datetime-local" value="{{(old('eDateFrom') != null ) ? old('eDateFrom') : date('Y-m-d\Th:m')}}"
                                       required>
                                @error('eDateFrom')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mt-1">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input class="form-control @error('eDateTo') is-invalid @enderror"
                                       name="eDateTo" type="datetime-local" value="{{(old('eDateTo') != null ) ? old('eDateTo') : date('Y-m-d\Th:m')}}"
                                       required>
                                @error('eDateTo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr class="mx-3 my-4">

                            <div class="input-group mt-2">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Organisateur</span>
                                </div>
                                <select class="form-control" name="eGroup">
                                    @foreach($listGroup as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                                @error('eGroup')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 m-auto p-4">

                        <div id="map">

                            TODO:MAP

                        </div>
                        <hr class="my-4 mx-4">
                        <div class="row mb-3">
                            <div class="col-lg-2">

                                <input class="form-control @error('eNumStreet') is-invalid @enderror"
                                       name="eNumStreet" type="text" value="{{ old('eNumStreet') }}"
                                       placeholder="Num"
                                       required autocomplete="off">
                                @error('eNumStreet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-lg-10">

                                <input class="form-control @error('eStreet') is-invalid @enderror"
                                       name="eStreet" type="text" value="{{ old('eStreet') }}"
                                       placeholder="Rue"
                                       required>
                                @error('eStreet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-6">

                                <input class="form-control @error('eCity') is-invalid @enderror"
                                       name="eCity" type="text" value="{{ old('eCity') }}"
                                       placeholder="Ville"
                                       required>
                                @error('eCity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-lg-2">

                                <input class="form-control @error('eZip') is-invalid @enderror"
                                       name="eZip" type="text" value="{{ old('eZip') }}"
                                       placeholder="Code postal"
                                       required>
                                @error('eZip')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-4">

                                <input class="form-control @error('eCountry') is-invalid @enderror"
                                       name="eCountry" type="text" value="{{ old('eCountry') }}"
                                       placeholder="Région"
                                       required>
                                @error('eCountry')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <a style="text-decoration: none" href="/frommeetup/event" class="float-right mb-4 mr-3">
                            <button style="margin-bottom: 0" type="button" class="btn btn-primary">
                                <p style=" font-weight: lighter;text-decoration: underline;font-size: 1vw;margin-bottom: 0">Vous avez déjà des évènements enregistrés sur Meetup.com ?</p>
                                Importer à partir de meetup
                            </button>
                        </a>

                        <button type="submit" class="btn btn-primary float-right my-4 mr-3">
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
