@extends('layouts.nav')

@section('content')

    <div class="container">

        <h4 id="bans" class="my-5">Bannissement des utilisateurs </h4>

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
                    <th scope="col">Du groupe</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>

                @forelse($banList as $ban)

                    <tr>
                        <td>#{{ $ban['ban']->id }}</td>
                        <td>{{ $ban['banned']->fname }} {{ $ban['banned']->lname }}</td>
                        <td>{{ $ban['banisher']->name }}</td>
                        <td>{{ $ban['ban']->date }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success"
                                   href="/admin/ban/show/{{ $ban['ban']->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="/admin/ban/delete/{{ $ban['ban']->id }}">
                                    <i class="fas fa-trash-alt"></i>
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
