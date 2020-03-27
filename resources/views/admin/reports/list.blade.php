@extends('layouts.nav')

@section('title')
    Liste des signalements
@endsection

@section('content')

    <div class="container">
        <h4 id="reports" class="my-5">Signalements des utilisateurs</h4>
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
                    <th scope="col">Concerné</th>
                    <th scope="col">Envoyé par</th>
                    <th scope="col">Créé le</th>

                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>

                @forelse($reportList as $report)

                    <tr>
                        <td>#{{ $report['report']->id }}</td>
                        <td>{{ $report['concerned']->fname }} {{ $report['concerned']->lname }}</td>
                        <td>{{ $report['sender']->fname }} {{ $report['sender']->lname }}</td>
                        <td>{{ $report['report']->date }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success"
                                   href="/admin/reports/show/{{ $report['report']->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="/admin/reports/delete/{{ $report['report']->id }}">
                                    <i class="fas fa-skull-crossbones"></i>
                                </a>
                            </div>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td>Aucune donnée</td>
                    </tr>
                @endforelse

                </tbody>
            </table>

            <a href="{{url('/admin/users/')}}" class="btn btn-primary float-right">Voir plus</a>
        </div>
    </div>
@endsection
