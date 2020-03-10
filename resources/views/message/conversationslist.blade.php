@extends('layouts.nav')

@section('content')
    <div class="rounded-lg overflow-hidden shadow">
        <!-- Users box-->
        <div class="px-0">
            <div class="bg-white">
                <hr>
                <div class="messages-box">
                    <div class="list-group mx-sm-2 mx-lg-4 rounded-0">
                        @
                        <div class="card border-bottom-fmm mb-1">
                            <a class="list-group-item list-group-item-action">
                                <!-- TODO: Href vers messages du contact -->
                                <div class="media">
                                    <div class="mask"><img width="50" style="top:50%" alt="#" src="#">
                                            <!--src= Contact photorepo photo nom -->
                                            <!-- alt= Contact prenom , contact nom -->
                                            </div>

                                    <div class="media-body ml-4">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h6 class="mb-0"> <!-- Message contact prénom --> </h6><small
                                                class="small font-weight-bold"><!-- Message date --></small>
                                        </div>
                                        <p class="font-italic mb-0 text-small">
                                            <!-- Message content -->
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

    <style>
        .fmm-active {
            background-image: linear-gradient(to left bottom, #730ebd, #9600b4, #b000aa, #c600a0, #d80096);
            transition: 0.5s;
            background-size: 200% auto;
            border-bottom: solid 1px white;
        }
        .fmm-active:hover {
            background-position: right center;
        }
    </style>


@endsection

