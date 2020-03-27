@extends('layouts.nav')

@section('title')
    Liste des groupes
@endsection

@section('content')

    <div class="container">

        <h4 id="users" class="my-5">Groupes</h4>

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
                    <th scope="col">Admin</th>
                    <th scope="col">Créé le</th>

                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>

                @forelse($groups as $group)

                    <tr>
                        <td>#{{ $group['group']->id }}</td>
                        <td>{{ $group['group']->name }}</td>
                        <td>{{ $group['admin']->fname }} {{ $group['admin']->lname }}</td>
                        <td>{{ $group['group']->datecreate }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success" href="/groups/show/{{ $group['group']->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="/groups/delete/{{ $group['group']->id }}">
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
