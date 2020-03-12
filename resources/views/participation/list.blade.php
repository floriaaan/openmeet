@extends('layouts.nav')

@section('content')
    <div class="container ">
        @forelse($events as $event)

            <div class="p-3">
                <div class="card hvr-grow rounded shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->name}}</h5>
                        <p class="card-text">{{$event->description}}</p>
                        <div class="row">
                            <div class="col-lg-8">
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
                            </div>
                            <div class="col-lg-4">
                                <a class="btn btn-danger" style="color: #fff"
                                   onclick="event.preventDefault();document.getElementById('toggleParticipation').submit();">
                                    <i class="fas fa-times"></i> Ne participe plus
                                </a>

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
            display: inherit!important;
        }
    </style>
@endsection
