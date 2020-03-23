@extends('layouts.nav')

@section('title')
    Participations
@endsection

@section('content')
    <div class="container ">
        @forelse($events as $event)

            <div class="p-3">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <a href="{{url('/events/show/'.$event->id)}}" style="text-decoration: none; color: inherit;">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <p class="card-text">{!! str_replace('\\n', '<br>', $event->description) !!}</p>
                            <hr class="mx-2 my-1">
                            <small class="text-muted mx-1">
                                Participants : {{(new \App\Participation)->getCount($event->id)}}
                            </small>
                        </a>
                        <div class="row justify-content-between mx-3">

                            <footer class="blockquote-footer">
                                <small class="text-muted">
                                    aura lieu le
                                    <cite>{{strftime("%A %d %b %Y",strtotime($event->datefrom))}}</cite>
                                </small>

                                @if($event->dateto != null)
                                    <br>
                                    <small class="text-muted">
                                        jusqu'au <cite>{{strftime("%A %d %b %Y",strtotime($event->dateto))}}</cite>
                                    </small>
                                @endif

                            </footer>

                            <div class="row justify-content-end">

                                <a class="btn btn-danger mx-1" style="color: #fff"
                                   onclick="event.preventDefault();document.getElementById('toggleParticipation').submit();">
                                    <i class="fas fa-times"></i> Ne participe plus
                                </a>


                            </div>
                            <form id="toggleParticipation" action="{{url('/events/participate/remove')}}"
                                  method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="event" value="{{$event->id}}">
                                <input type="hidden" name="user" value="{{auth()->id()}}">
                            </form>


                        </div>


                    </div>
                </div>
            </div>
        @empty
            <hr class="m-5">
            <h3 class="display-4">Vous ne participez à aucun évenement.</h3>
        @endforelse
    </div>

@endsection

@section('css')
    <style>
        .hvr-grow {
            display: inherit !important;
        }
    </style>
@endsection
