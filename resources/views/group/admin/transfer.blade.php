@extends('layouts.nav')

@section('title')
    Transfert de pouvoirs
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card shadow-lg p-2 pb-5">

            <h5 class="display-4 text-center mt-2">Transfert de pouvoirs</h5>
            <hr class="mx-5 my-3">
            <div class="d-flex" style="height: auto; width: auto">

                <div class="row justify-content-between p-5 w-100">
                    <div class="col-lg-4">
                        <div class="card shadow-sm p-5">
                            @if($user->picname != null)
                                <div class="row justify-content-center">
                                    <img src="{{url('/storage/upload/image/'.$user->picrepo.'/'.$user->picname)}}"
                                         width="100px"
                                         height="100px">
                                </div>
                            @endif

                            <h5 class="card-title">{{$user->fname}} {{$user->lname}}</h5>
                            <hr class="mx-4 my-2">
                            <input type="text" value="{{$user->email}}" readonly class="form-control">

                        </div>
                    </div>

                    <div class="col-lg-4 d-none-transfer">
                        <div class="arrow mt-n3 ml-n1">
                            <span></span>
                            <span></span>
                            <span></span>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-sm p-5">
                            @if($group->picname != null)
                                <div class="row justify-content-center">
                                    <img src="{{url('/storage/upload/image/'.$group->picrepo.'/'.$group->picname)}}"
                                         width="100px"
                                         height="100px">
                                </div>
                            @endif

                            <h5 class="card-title">{{$group->name}}</h5>
                            <hr class="mx-4 my-2">
                            <p class="lead">{!! \Illuminate\Support\Str::limit(str_replace('\\n','<br>',$group->desc), 50, $end='...') !!}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <form method="POST" action="{{url('/groups/admin/transfer')}}" class="">
                    @csrf
                    <input type="hidden" name="group" value="{{$group->id}}">
                    <input type="hidden" name="user" value="{{$user->id}}">
                    <button type="submit" class="btn btn-success btn-xl rounded-pill">Transférer</button>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('css')
    <style>
        .arrow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .arrow span {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-bottom: 5px solid var(--openmeet);
            border-right: 5px solid var(--openmeet);

            margin: 0;
            animation: animate 2s infinite;
        }

        .arrow span:nth-child(2) {
            animation-delay: -0.2s;
        }

        .arrow span:nth-child(3) {
            animation-delay: -0.4s;
        }

        @keyframes animate {
            0% {
                opacity: 0;
                transform: rotate(-45deg) translate(-20px, 0px);
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: rotate(-45deg) translate(0px, 20px);
            }
        }

        @media (max-width: 990px) {
            .d-none-transfer {
                display: none;
            }
        }
    </style>
@endsection
