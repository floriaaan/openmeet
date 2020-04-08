@extends('layouts.nav')

@section('title')
    Créer un groupe
@endsection

@section('content')

    <div class="container-fluid">
        <form action="{{url('/groups/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card rounded shadow-lg mt-1 mb-3 mx-auto h-100" style="width: 95%">
                <div class="row no-gutters">
                    <div class="col-md-4 m-auto p-4">

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gPic" id="gPic" lang="fr">
                                <label class="custom-file-label mb-1" for="gPic">Photo du groupe</label>
                            </div>
                        </div>
                        <hr class="mx-5 mt-1 my-0">
                        <p class="mx-5 my-0 ml-4" style="font-size: small">Ou entrez l'url d'une image <br> (vider le champs upload)</p>
                        <hr class="mx-5 mt-0 my-0">
                        <input class="mb-1 mt-1 form-control form-control @error('gPhotoUrl') is-invalid @enderror" type="text" value="{{$groupPhotoUrl}}" placeholder="Entrez une url" name="gPhotoUrl">




                        <hr class="mx-5 mt-0">


                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                            </div>
                            <input class="form-control @error('gTags') is-invalid @enderror"
                                   name="gTags" type="text" value="{{ $groupTags ?? '' }}" placeholder="Tags du groupe"
                                   id="gTags">
                        </div>
                        <label for="gTags"><small>Séparés par des points-virgules 🛑</small></label>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <h2 class="display-4 mb-1" id="title-group"></h2>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <input class="form-control form-control-lg @error('gName') is-invalid @enderror"
                                       name="gName" type="text" value="{{ $groupName }}" placeholder="Nom du groupe"
                                       required id="title-input">
                            </div>
                            <hr class="mx-4 my-4">

                            <textarea class="form-control @error('gDesc') is-invalid @enderror desc"
                                      name="gDesc" rows="8"
                                      placeholder="Description du groupe">{{ $groupDesc }}</textarea>

                            <div class="input-group mt-1">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Administrateur</span>
                                </div>
                                <input class="form-control"
                                       type="text" value="{{ auth()->user()->fname }} {{ auth()->user()->lname }}"
                                       readonly
                                       required>
                            </div>
                        </div>

                        <div class="row justify-content-end p-5">
                            <a href="{{url('/frommeetup/group')}}" class="btn btn-danger btn-icon-split mx-2">
                                <span class="icon text-white-50">
                                    <i class="fab fa-meetup"></i>
                                </span>
                                <span class="text">Importer à partir de Meetup</span>
                            </a>

                            <button type="submit" class="btn btn-primary mr-3">
                                Créer un groupe
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            <input type="hidden" name="gAdminID" value="{{auth()->id()}}">
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
