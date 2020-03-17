@extends('layouts.nav')

@section('title')
    Editer mon profil
@endsection

@section('content')
    <form action="{{url('/user/edit/')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="p-3">
                        <div class="card shadow-lg p-3">
                            @if(auth()->user()->picname != null)
                                <div class="overflow-hidden">
                                    <img
                                        alt="Photo de {{auth()->user()->fname}} {{auth()->user()->lname}}"
                                        src="{{url('/storage/upload/image/'.auth()->user()->picrepo.'/'.auth()->user()->picname)}}"
                                        class="card-img hvr-grow">
                                </div>
                            @else
                                <small class="blockquote-footer">Pas de photo.</small>
                            @endif
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="uPic" id="uPic" lang="fr">
                                    <label class="custom-file-label mb-1" for="gPic">Photo d'utilisateur</label>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{auth()->user()->fname}} {{auth()->user()->lname}}</h5>

                                <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control">


                            </div>
                                <hr class="mx-5 my-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Membre
                                    de {{(new \App\Subscription)->countByUser(auth()->id())}}
                                    {{str_plural('groupe', (new \App\Subscription)->countByUser(auth()->id()))}}
                                </li>
                                <li class="list-group-item">
                                    <small class="blockquote-footer">Administrateur
                                        de {{count((new \App\Group)->getByAdmin(auth()->id()))}}
                                        {{str_plural('groupe', count((new \App\Group)->getByAdmin(auth()->id())))}}
                                    </small>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <button type="submit" class="btn btn-primary mx-5">Valider</button>
                    <hr class="my-3 mx-5">

                    <div class="p-3">

                        <div class="card shadow-sm p-3">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <h5 class="">Groupes de {{auth()->user()->fname}}</h5>
                                    <a href="{{url('/user/groups/remove/all')}}" class="text-danger mr-5">Retirer tout
                                        les groupes</a>
                                </div>
                            </div>

                            <ul class="list-group">
                                @forelse($groups as $group)
                                    <li class="list-group-item">{{$group->name}}</li>
                                @empty
                                    <li class="list-group-item">Aucun groupe</li>
                                @endforelse
                            </ul>
                        </div>


                        <div class="card mt-5 shadow-sm p-3">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <h5 class="">Evenements de {{auth()->user()->fname}}</h5>
                                    <a href="{{url('/user/events/remove/all')}}" class="text-danger mr-5">Retirer tout
                                        les évenements</a>
                                </div>
                            </div>

                            <ul class="list-group">
                                @forelse($events as $event)
                                    <li class="list-group-item">{{$event->name}}</li>
                                @empty
                                    <li class="list-group-item">Aucun événement</li>
                                @endforelse
                            </ul>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </form>
@endsection
