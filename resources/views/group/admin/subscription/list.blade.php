@extends('layouts.nav')

@section('title')
    Liste des abonnements
@endsection

@section('content')

    <div class="container">

        <h4 id="sub" class="my-5">Abonnements</h4>

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

                    <th scope="col">Date d'abonnement</th>


                </tr>
                </thead>
                <tbody>

                @forelse($list as $sub)

                    <tr>
                        <td>#{{ $sub['sub']->id }}</td>
                        <td>{{ $sub['user']->fname }} {{ $sub['user']->lname }}</td>
                        <td>{{strftime("%A %d %b %Y",strtotime($sub['sub']->date))}}</td>

                    </tr>

                @empty
                    <tr>
                        <td>❎</td>
                        <td>❎ Aucun abonné(e)</td>
                        <td>❎</td>

                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>
    </div>

@endsection


