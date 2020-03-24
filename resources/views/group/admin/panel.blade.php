@extends('layouts.nav')

@section('title')
    Administration
@endsection

@section('content')

    <div class="container position-relative" style="height: 100%">
        <div class="row">

            <form method="post" action="{{url('/groups/admin/')}}">
                @csrf
                <div class="col-lg-9">
                    <div class="input-group mt-2">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Groupe</span>
                        </div>

                        <select class="form-control" name="pGroup">
                            @foreach($groupList as $group)

                                <option @if($group->id == $groupChosen) selected
                                        @endif value="{{$group->id}}">{{$group->name}}</option>

                            @endforeach
                        </select>
                        @error('eGroup')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
