@extends('layouts.nav')

@section('title')
    Bannissements
@endsection

@section('content')

    <div class="container">

        <h4 id="bans" class="my-5">Bannissements des utilisateurs </h4>

        <a class="btn btn-primary my-2  float-right mr-5" style="color: white"
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

            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Utilisateur banni</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                @forelse($list as $ban)
                    <tr>
                        <td>#{{$ban['ban']->id}}</td>
                        <td>{{$ban['banned']->fname}} {{$ban['banned']->lname}}</td>
                        <td>{{$ban['ban']->description}}</td>
                        <td>{{strftime("%d %b %Y",strtotime($ban['ban']->date))}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{url('/group/admin/ban/'.$ban['ban']->id)}}"
                                   class="btn btn-secondary">
                                    <i class="fas fa-user-slash"></i>
                                    Débannir
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="">
                        <td>❎</td>
                        <td>❎ Aucun banissement</td>
                        <td>❎</td>
                        <td>❎</td>

                    </tr>
                @endforelse
                </tbody>
            </table>


        </div>
    </div>

@endsection
