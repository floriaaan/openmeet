@extends('layouts.nav')

@section('title')
    Liste des événements
@endsection

@section('content')

    <div class="container">

        <h4 id="events" class="my-5">Evénements</h4>

        <a class="btn btn-primary my-2 float-right mr-5" style="color: white"
           onclick="event.preventDefault();document.getElementById('return').submit()">
            Retour
            <i class="fas fa-arrow-right"></i>
        </a>
        <form action="{{url('/groups/admin/')}}" method="POST" class="d-none" id="return">
            @csrf
            <input type="hidden" name="pGroup" value="{{$group}}">
        </form>
        <hr class="m-4">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Participations</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>

                @forelse($list as $event)

                    <tr>
                        <td>#{{ $event['event']->id }}</td>
                        <td>{{ $event['event']->name }}</td>
                        <td>{{ count($event['participations']) }}</td>
                        <td>
                            {{strftime("%A %d %b %Y",strtotime($e['event']->datefrom))}}
                            à {{strftime("%R",strtotime($e['event']->datefrom))}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success"
                                   href="/events/show/{{ $event['event']->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="/events/delete/{{ $event['event']->id }}">
                                    <i class="fas fa-skull-crossbones"></i>
                                </a>
                            </div>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td>❎</td>
                        <td>❎ Aucun événement</td>
                        <td>❎</td>
                        <td>❎</td>
                        <td>❎</td>

                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>
    </div>

@endsection


