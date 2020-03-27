@extends('layouts.nav')

@section('content')

    <div class="container">

        <h4 id="bans" class="my-5">Blocage des utilisateurs </h4>

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

                @forelse($blockList as $block)

                    <tr>
                        <td>#{{ $block['block']->id }}</td>
                        <td>{{ $block['target']->fname }} {{ $block['target']->lname }}</td>
                        <td>{{ $block['blocker']->fname }} {{ $block['blocker']->lname }}</td>
                        <td>{{ $block['block']->date }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-success"
                                   href="/admin/blocks/show/{{ $block['block']->id }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <a class="btn btn-danger"
                                   href="/admin/blocks/delete/{{ $block['block']->id }}">
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



