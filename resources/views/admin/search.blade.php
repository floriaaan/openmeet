@extends('layouts.nav')

@section('content')

    <div class="container-fluid p-5">
        <h3 class="display-4">Résultats correspondants à : {{$search}}</h3>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @forelse($results as $result)
                @if($result['type'] == 'group')
                    <a href="{{url('/groups/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;">
                        <div class="p-3">
                            <div class="card border-group rounded hvr-grow shadow-sm">

                                @if($result['content']->picname != null)
                                    <img
                                        src="{{url('/storage/upload/image/'.$result['content']->picrepo.'/'.$result['content']->picname)}}"
                                        class="card-img" alt="Photo de {{$result['content']->name}}">
                                @else
                                    <small class="p-3 blockquote-footer">Pas de photo</small>
                                @endif


                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->name}}</h5>
                                    <p class="card-text">{{$result['content']->desc}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'event')
                    <a href="{{url('/events/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;">
                        <div class="p-3">
                            <div class="card border-event rounded shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->name}}</h5>
                                    <p class="card-text">{{$result['content']->description}}</p>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            aura lieu le
                                            <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->datefrom))}}
                                                à {{strftime("%R",strtotime($result['content']->datefrom))}}</cite>
                                        </small>
                                        @if($result['content']->dateto != null)
                                            <br>
                                            <small class="text-muted">
                                                jusqu'au
                                                <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->dateto))}}
                                                    à {{strftime("%R",strtotime($result['content']->dateto))}}</cite>
                                            </small>
                                        @endif
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'user')
                    <a href="{{url('/user/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;">
                        <div class="p-3">
                            <div class="card border-user rounded shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->fname}} {{$result['content']->lname}}</h5>
                                    <p class="card-text">{{$result['content']->email}}</p>
                                    <footer class="blockquote-footer">
                                        @if($result['content']->isadmin)
                                            <span class="badge badge-pill badge-success">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-danger">
                                                <i class="fas fa-user-times"></i>
                                            </span>
                                        @endif
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'message')
                    <div class="p-3">
                        <div class="card rounded border-message shadow-sm hvr-grow">
                            <div class="card-body">
                                <h5 class="card-title">{{$result['content']->content}}</h5>
                                <footer class="blockquote-footer">
                                    <small class="text-muted">
                                        de
                                        <cite>{{$result['sender']->fname}} {{$result['sender']->lname}}</cite>
                                    </small>
                                    <small class="text-muted">
                                        à
                                        @if($result['content']->forgroup)
                                            <cite>{{$result['receiver']->name}}</cite>
                                        @else
                                            <cite>{{$result['receiver']->fname}} {{$result['receiver']->lname}}</cite>
                                        @endif
                                    </small>
                                </footer>
                            </div>
                        </div>
                    </div>

                @elseif($result['type'] == 'signalement')
                    <a href="{{url('/admin/reports/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;">
                        <div class="p-3">
                            <div class="card rounded border-signalements shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->description}}
                                        @if($result['content']->isread)
                                            <span class="badge badge-success">Traité</span>
                                        @else
                                            <span class="badge badge-danger">Non traité</span>
                                        @endif
                                    </h5>
                                    <small class="text-muted">
                                        créé le
                                        <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->date))}}
                                            à {{strftime("%R",strtotime($result['content']->date))}}</cite>
                                    </small>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            émis par
                                            <cite>{{$result['sender']->fname}} {{$result['sender']->lname}}</cite>
                                        </small>
                                        <small class="text-muted">
                                            pour
                                            <cite>{{$result['receiver']->fname}} {{$result['receiver']->lname}}</cite>
                                        </small>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif

            @empty
                <h2 class="display-4">Aucune donnée pour : {{$search}}</h2>
            @endforelse
        </div>


    </div>

@endsection

@section('js')

    <script>

    </script>
@endsection

@section('css')

    <style>
        .border-group {
            border-bottom: 0.25rem solid var(--openmeet) !important;
        }

        .border-event {
            border-bottom: 0.25rem solid #49bd3a !important;
        }

        .border-user {
            border-bottom: 0.25rem solid #154bbd !important;
        }

        .border-message {
            border-bottom: 0.25rem solid #bd7300 !important;
        }

        .border-signalements {
            border-bottom: 0.25rem solid #bd0028 !important;
        }
    </style>

@endsection
