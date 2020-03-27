@extends('layouts.nav')

@section('title')
    Editer {{$group->name}}
@endsection

@section('content')

    <div class="container-fluid">
        <form action="{{url('groups/edit')}}" method="POST" enctype="multipart/form-data">
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

                        <hr class="m-5">


                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                            </div>
                            <input class="form-control @error('gTags') is-invalid @enderror"
                                   name="gTags" type="text" value="{{ $group->tags }}" placeholder="Tags du groupe"
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
                                       name="gName" type="text" value="{{$group->name}}" placeholder="Nom du groupe"
                                       required id="title-input">
                            </div>
                            <hr class="mx-4 my-4">

                            <textarea class="form-control @error('gDesc') is-invalid @enderror desc"
                                      name="gDesc" rows="8"
                                      placeholder="Description du groupe">{{nl2br($group->desc)}}</textarea>


                        </div>

                        <div class="row justify-content-end p-5">
                            <a class="btn btn-secondary float-right mx-4" style="color: white"
                               onclick="event.preventDefault();document.getElementById('return').submit()">
                                <i class="fas fa-tools"></i>
                                Panneau de gestion
                            </a>

                            <button type="submit" class="btn btn-primary mx-4">
                                <i class="fas fa-pencil-alt"></i>
                                Modifier {{$group->name}}
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            <input type="hidden" name="groupID" value="{{$group->id}}">
            <input type="hidden" name="gAdminID" value="{{$group->admin}}">
        </form>
    </div>

    <form action="{{url('/groups/admin/')}}" method="POST" class="d-none" id="return">
        @csrf
        <input type="hidden" name="pGroup" value="{{$group->id}}">
    </form>
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
