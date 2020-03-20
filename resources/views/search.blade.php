@extends('layouts.nav')

@section('title')
    Recherche
@endsection

@section('content')

    <div class="container-fluid p-5">
        <h3 class="display-4">Recherche correspondante à : {{$s}}</h3>
        <hr class="my-3 mx-5">
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="groups">
                    <label class="custom-control-label" for="groups">Groupes</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="events">
                    <label class="custom-control-label" for="events">Evenements</label>
                </div>
            </div>
        </div>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @foreach($search as $sR)

                @if($sR['type'] == 'group')
                    <div class="p-3" id="group-{{$sR['content']->id}}">
                        <div class="card rounded hvr-grow shadow-sm">

                            @if($sR['content']->picname != null)
                                <a href="{{url('/groups/show')}}/{{$sR['content']->id}}"
                                   style="text-decoration: none; color: inherit;">
                                    <div class="mask-search">
                                        <img
                                            src="{{url('/storage/upload/image/'.$sR['content']->picrepo.'/'.$sR['content']->picname)}}"
                                            class="card-img" alt="Photo de {{$sR['content']->name}}">
                                    </div>

                                </a>
                            @else
                                <small class="p-3 blockquote-footer">Pas de photo</small>
                            @endif


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <a href="{{url('/groups/show')}}/{{$sR['content']->id}}"
                                           style="text-decoration: none; color: inherit;">
                                            <h5 class="card-title">{{$sR['content']->name}}</h5>
                                            <p class="card-text">{!! str_replace('\\n','<br>',$sR['content']->desc) !!}</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="subscribe" id="subscribe-{{$sR['content']->id}}"></div>
                                        <!--<span class="text-danger">J'aime</span>-->

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>



                @elseif($sR['type'] == 'event')
                    <a href="{{url('/events/show')}}/{{$sR['content']->id}}" id="event-{{$sR['content']->id}}"
                       style="text-decoration: none; color: inherit;">
                        <div class="p-3">
                            <div class="card rounded shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$sR['content']->name}}</h5>
                                    <p class="card-text">{!! str_replace('\\n','<br>',$sR['content']->description) !!}</p>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            aura lieu le
                                            <cite>{{strftime("%A %d %b %Y",strtotime($sR['content']->datefrom))}}
                                                à {{strftime("%R",strtotime($sR['content']->datefrom))}}</cite>
                                        </small>
                                        @if($sR['content']->dateto != null)
                                            <br>
                                            <small class="text-muted">
                                                jusqu'au
                                                <cite>{{strftime("%A %d %b %Y",strtotime($sR['content']->dateto))}}
                                                    à {{strftime("%R",strtotime($sR['content']->dateto))}}</cite>
                                            </small>
                                        @endif
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

    </div>

@endsection

@section('js')

    <script>

        $('#groups').click(function () {
            $('[id*="group-"]').toggleClass('d-none')
        });

        $('#events').click(function () {
            $('[id*="event-"]').toggleClass('d-none')
        });

        $.ajax({
            url: "{{url('/api/v1/groups/subscribe/'.auth()->id())}}",
            type: "GET",
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    if (data[i].state) {
                        document.getElementById('subscribe-' + data[i].id).classList.toggle("active");
                    }
                }

            },
            error: function () {
                console.log('Error while getting subs')
            }
        });


        document.querySelectorAll('.subscribe').forEach(item => {
            item.addEventListener('click', function () {
                this.classList.toggle("active");
                $.ajax({
                    url: "{{url('/api/v1/groups/subscribe')}}",
                    type: "POST",
                    data: {
                        'user': '{{auth()->id()}}',
                        'group': this.id.substring(10)
                    },
                    success: function (data) {
                        console.log(data[1])
                    },
                    error: function () {
                        console.log('Error while subscription')
                    }
                })

            })
        })


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
        .mask-search{
            height: 150px;
            overflow: hidden;
        }

        .card-img {
            vertical-align: middle;
            background-position: 50% 50%;
        }


        .subscribe {
            width: 100px;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            background: url(https://abs.twimg.com/a/1450471907/img/t1/web_heart_animation.png) no-repeat;
            background-position: 0 0;
        }

        .subscribe:hover {
            background-position: -2800px 0;
        }

        .subscribe.active {
            background-position: -2800px 0;
            transition: background 1s steps(28);
            animation: fave-twitter 1s steps(28);
        }

        @keyframes fave-twitter {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: -2800px 0;
            }
        }


    </style>

@endsection
