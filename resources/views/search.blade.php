@extends('layouts.nav')

@section('title')
    Recherche
@endsection

@section('content')

    <div class="container-fluid p-5">
        <h3 class="display-4">Groupes correspondants à : {{$search}}</h3>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @foreach($groups as $group)

                <div class="p-3">
                    <div class="card rounded hvr-grow shadow-sm">

                        @if($group->picname != null)
                            <a href="{{url('/groups/show')}}/{{$group->id}}"
                               style="text-decoration: none; color: inherit;">
                                <img
                                    src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                                    class="card-img" alt="Photo de {{$group->name}}">
                            </a>
                        @else
                            <small class="p-3 blockquote-footer">Pas de photo</small>
                        @endif


                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <a href="{{url('/groups/show')}}/{{$group->id}}"
                                       style="text-decoration: none; color: inherit;">
                                        <h5 class="card-title">{{$group->name}}</h5>
                                        <p class="card-text">{{$group->desc}}</p>
                                    </a>
                                </div>
                                <div class="col-lg-4">

                                    <div class="subscribe" id="subscribe-{{$group->id}}"></div>
                                    <span class="text-danger">J'aime</span>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        <h3 class="display-4">Evenements correspondants à : {{$search}}</h3>
        <hr class="my-3 mx-5">
        <div class="card-columns">


            @foreach($events as $event)
                <a href="{{url('/events/show')}}/{{$event->id}}" style="text-decoration: none; color: inherit;">
                    <div class="p-3">
                        <div class="card rounded shadow-sm hvr-grow">
                            <div class="card-body">
                                <h5 class="card-title">{{$event->name}}</h5>
                                <p class="card-text">{{$event->description}}</p>
                                <footer class="blockquote-footer">
                                    <small class="text-muted">
                                        aura lieu le
                                        <cite>{{strftime("%A %d %b %Y",strtotime($event->datefrom))}}
                                            à {{strftime("%R",strtotime($event->datefrom))}}</cite>
                                    </small>
                                    @if($event->dateto != null)
                                        <br>
                                        <small class="text-muted">
                                            jusqu'au <cite>{{strftime("%A %d %b %Y",strtotime($event->dateto))}}
                                                à {{strftime("%R",strtotime($event->dateto))}}</cite>
                                        </small>
                                    @endif
                                </footer>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>

@endsection

@section('js')

    <script>

        $.ajax({
            url: "{{url('/api/v1/groups/subscribe/'.auth()->id())}}",
            type: "GET",
            success: function (data) {
                for(let i = 0; i < data.length; i++) {
                    if(data[i].state) {
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
        .card-img{
            height: 150px;
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
