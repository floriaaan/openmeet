@extends('layouts.nav')

@section('title')
    Créer un groupe
@endsection

@section('content')

    <div class="container-fluid">
        <form action="/groups/create" method="POST">
            @csrf
            <div class="card rounded shadow-lg mb-3 mx-auto h-100" style="width: 95%">
                <div class="row no-gutters">
                    <div class="col-md-4 m-auto p-2">

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gPic" id="gPic" lang="fr">
                                <label class="custom-file-label mb-1" for="gPic">Photo du groupe</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <h2 class="display-4 mb-1" id="title-group"></h2>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                </div>
                                <input class="form-control form-control-lg @error('gName') is-invalid @enderror"
                                       name="gName" type="text" value="{{ $groupName  }}" placeholder="Nom du groupe"
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
                        <a style="text-decoration: none" href="/frommeetup/group" class="btn btn-primary float-right mb-4 mr-3">
                            <p style="text-decoration: underline;font-size: 1.2vw;margin-bottom: 0">Ce n'est pas votre groupe ?</p>
                            Importer à partir de meetup
                        </a>
                        <button type="submit" class="btn btn-primary float-right mb-4 mr-3">
                            Créer un groupe
                        </button>
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
