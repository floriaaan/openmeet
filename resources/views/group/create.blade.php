@extends('layouts.nav')

@section('content')

    <div class="container-fluid">
        <form action="/groups/create" method="POST">
            @csrf
            <div class="card rounded shadow mb-3 mx-auto h-100" style="width: 95%">
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
                                       name="gName" type="text" value="{{ old('gName') }}" placeholder="Nom du groupe"
                                       required id="title-input">
                            </div>
                            <hr class="mx-4 my-4">

                            <textarea class="form-control @error('gDesc') is-invalid @enderror desc"
                                      name="gDesc" value="{{ old('gDesc') }}" rows="8"
                                      placeholder="Description du groupe"
                                      required></textarea>

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
            console.log($('#title-group').text())
            $('#title-input').keyup(function () {
                let input = $('#title-input').val()
                $('#title-group').text(input);
            })
        })
    </script>
@endsection
