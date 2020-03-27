@extends('layouts.nav')

@section('title')
    Liste des événements
@endsection

@section('content')

    <div class="container">

        <h4 id="events" class="my-5">Evénements</h4>

        <a class="btn btn-link float-right mr-5"
           href="{{url('/admin')}}">
            Retour
            <i class="fas fa-arrow-right"></i>
        </a>
        <hr class="m-4">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Organisateur</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>

                @forelse($events as $event)

                    <tr>
                        <td>#{{ $event['event']->id }}</td>
                        <td>{{ $event['event']->name }}</td>
                        <td>{{ $event['group']->name }}</td>
                        <td>{{ $event['event']->datefrom }}</td>
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
                        Aucune donnée
                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>
    </div>

@endsection


