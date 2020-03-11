@extends('layouts.nav')

@section('content')

    <div class="container">

        <h4 id="users" class="my-5">Utilisateurs</h4>

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
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>#{{ $user->id }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->isadmin)
                                <span class="badge badge-pill badge-success">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                            @else
                                <span class="badge badge-pill badge-danger">
                                                <i class="fas fa-user-times"></i>
                                            </span>
                            @endif
                        </td>
                        <td>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success" href="/user/show/{{ $user->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-warning" href="/user/report/{{ $user->id }}">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </a>
                                <a class="btn btn-danger" href="/admin/users/delete/{{ $user->id }}">
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
@endsection
