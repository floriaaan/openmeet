@extends('layouts.nav')

@section('title')
    Créer un événement
@endsection

@section('content')

    <div class="container-fluid">
        <form action="{{url('/events/create')}}" method="POST" enctype="multipart/form-data">
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
                                      name="eDesc" rows="4"
                                      placeholder="Description du groupe">{{ old('eDesc') }}</textarea>
                            @error('eDesc')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <hr class="mx-4 my-4">

                            <label for="eDateFrom" class="my-1"><small>A partir de :</small></label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input class="form-control @error('eDateFrom') is-invalid @enderror"
                                       name="eDateFrom" type="datetime-local"
                                       value="{{(old('eDateFrom') != null ) ? old('eDateFrom') : date('Y-m-d\TH:i')}}"
                                       required>
                                @error('eDateFrom')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="eDateFrom" class="my-1"><small>Jusqu'à :</small></label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input class="form-control @error('eDateTo') is-invalid @enderror"
                                       name="eDateTo" type="datetime-local"
                                       value="{{old('eDateTo')}}">
                                @error('eDateTo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr class="mx-3 my-4">
                            <div class="input-group mt-2">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ePic" id="ePic" lang="fr">
                                    <label class="custom-file-label mb-1" for="ePic">Photo de l'événement</label>
                                </div>
                            </div>

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


                        </div>
                        <hr class="my-4 mx-4">
                        <div class="row mb-3">
                            <div class="col-lg-2">

                                <input id="inputNumRue"
                                       class="form-control my-1 @error('eNumStreet') is-invalid @enderror"
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

                                <input id="inputRue" class="form-control my-1 @error('eStreet') is-invalid @enderror"
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

                                <input id="inputVille" class="form-control my-1 @error('eCity') is-invalid @enderror"
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

                                <input id="inputCP" class="form-control my-1 @error('eZip') is-invalid @enderror"
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

                                <input id="inputCountry"
                                       class="form-control my-1 @error('eCountry') is-invalid @enderror"
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
                        <input id="inputPosx" type="hidden" name="elon" value="{{old('elon')}}">
                        <input id="inputPosy" type="hidden" name="elat" value="{{old('elat')}}">


                        <div class="row justify-content-end p-3">
                            <a href="{{url('/frommeetup/event')}}" class="btn btn-danger btn-icon-split mx-2 my-1">
                                <span class="icon text-white-50">
                                    <i class="fab fa-meetup"></i>
                                </span>
                                <span class="text">Importer à partir de Meetup</span>
                            </a>

                            <button type="submit" class="btn btn-primary my-1 mx-2">
                                Créer un événement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{url('/js/map.js')}}"></script>
@endsection

@section('js')

    <script>
        var numRue = document.getElementById('inputNumRue');
        var rue = document.getElementById('inputRue');
        var ville = document.getElementById('inputVille');
        var cp = document.getElementById('inputCP');
        var pays = document.getElementById('inputCountry');
        var inputPosx = document.getElementById('inputPosx');
        var inputPosy = document.getElementById('inputPosy');
        displayMap();
        $(function () {
            console.log($('#title-group').text());
            $('#title-input').keyup(function () {
                let input = $('#title-input').val();
                $('#title-group').text(input);
            });
        });
        function reverseLatLng(lat, lng) {
            inputPosx.value = lng;
            inputPosy.value = lat;
            $.ajax({
                url: 'https://api-adresse.data.gouv.fr/reverse/?lon=' + lng + '&lat=' + lat,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log(data)
                    mymap.eachLayer(function (layer) {
                        if ((layer._url) != ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")) {
                            mymap.removeLayer(layer);
                        }
                    })
                    displayEvent(lng, lat);
                    ville.value = data.features[0].properties.city;
                    pays.value = "France";
                    cp.value = data.features[0].properties.postcode;
                    numRue.value = data.features[0].properties.housenumber;
                    rue.value = data.features[0].properties.street;
                },
                error: function () {
                    console.log('Reverse LatLng failed')
                }
            })
        }

        window.onload = function Init() {


            numRue.addEventListener('keyup', function e() {

                if (numRue.value != "" && rue.value != "" && ville.value != "") {
                    var url = "https://api-adresse.data.gouv.fr/search/?q=" + numRue.value + " " + rue.value + " " + ville.value + "&type=housenumber&autocomplete=1";
                } else {
                    if (rue.value != "" && ville.value != "") {
                        var url = "https://api-adresse.data.gouv.fr/search/?q=" + rue.value + " " + ville.value + "&type=street&autocomplete=1";
                    } else {
                        if (ville.value != "") {
                            var url = "https://api-adresse.data.gouv.fr/search/?q=" + ville.value + "&type=municipality&autocomplete=1";
                        }
                    }
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.features[0] != undefined) {
                            mymap.eachLayer(function (layer) {
                                if ((layer._url) != ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")) {
                                    mymap.removeLayer(layer);
                                }
                            })
                            cp.value = data.features[0].properties.postcode;
                            pays.value = "France";
                            inputPosx.value = data.features[0].geometry.coordinates[0];
                            inputPosy.value = data.features[0].geometry.coordinates[1];
                            displayEvent(data.features[0].geometry.coordinates[0], data.features[0].geometry.coordinates[1]);
                        } else {
                            cp.value = "";
                            pays.value = "";
                            inputPosx.value = "";
                            inputPosy.value = "";
                        }
                    },
                    error: function () {

                    }
                });


            });

            rue.addEventListener('keyup', function e() {

                if (numRue.value != "" && rue.value != "" && ville.value != "") {
                    var url = "https://api-adresse.data.gouv.fr/search/?q=" + numRue.value + " " + rue.value + " " + ville.value + "&type=housenumber&autocomplete=1";
                } else {
                    if (rue.value != "" && ville.value != "") {
                        var url = "https://api-adresse.data.gouv.fr/search/?q=" + rue.value + " " + ville.value + "&type=street&autocomplete=1";
                    } else {
                        if (ville.value != "") {
                            var url = "https://api-adresse.data.gouv.fr/search/?q=" + ville.value + "&type=municipality&autocomplete=1";
                        } else {
                            var url = ""
                        }
                    }
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.features[0] != undefined) {
                            mymap.eachLayer(function (layer) {
                                if ((layer._url) != ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")) {
                                    mymap.removeLayer(layer);
                                }
                            })
                            cp.value = data.features[0].properties.postcode;
                            pays.value = "France";
                            inputPosx.value = data.features[0].geometry.coordinates[0];
                            inputPosy.value = data.features[0].geometry.coordinates[1];
                            displayEvent(data.features[0].geometry.coordinates[0], data.features[0].geometry.coordinates[1]);
                        } else {
                            cp.value = "";
                            pays.value = "";
                            inputPosx.value = "";
                            inputPosy.value = "";
                        }
                    },
                    error: function () {

                    }
                });


            });

            ville.addEventListener('keyup', function e() {

                if (numRue.value != "" && rue.value != "" && ville.value != "") {
                    var url = "https://api-adresse.data.gouv.fr/search/?q=" + numRue.value + " " + rue.value + " " + ville.value + "&type=housenumber&autocomplete=1";
                } else {
                    if (rue.value != "" && ville.value != "") {
                        var url = "https://api-adresse.data.gouv.fr/search/?q=" + rue.value + " " + ville.value + "&type=street&autocomplete=1";
                    } else {
                        if (ville.value != "") {
                            var url = "https://api-adresse.data.gouv.fr/search/?q=" + ville.value + "&type=municipality&autocomplete=1";
                        } else {
                            var url = ""
                        }
                    }
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    datatype: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.features[0] != undefined) {
                            mymap.eachLayer(function (layer) {
                                if ((layer._url) != ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")) {
                                    mymap.removeLayer(layer);
                                }
                            })
                            cp.value = data.features[0].properties.postcode;
                            pays.value = "France";
                            inputPosx.value = data.features[0].geometry.coordinates[0];
                            inputPosy.value = data.features[0].geometry.coordinates[1];
                            displayEvent(data.features[0].geometry.coordinates[0], data.features[0].geometry.coordinates[1]);
                        } else {
                            cp.value = "";
                            pays.value = "";
                            inputPosx.value = "";
                            inputPosy.value = "";
                        }
                    },
                    error: function () {

                    }
                });


            });

            mymap.on('click', function (e) {
                let popup = L.popup();
                popup.setLatLng(e.latlng)
                    .setContent('<button class="btn btn-primary" onclick="event.preventDefault();reverseLatLng(' + e.latlng.lat + ', ' + e.latlng.lng + ')">Choisir cet emplacement</button>')
                    .openOn(mymap);

            });



        }

    </script>
@endsection

@section('css')
    <style>
        #map {
            height: 250px;
            width: 100%;
        }
    </style>
@endsection
