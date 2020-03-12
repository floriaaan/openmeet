@extends('layouts.nav')

@section('content')
    <div class="container extended" style="margin-left: -1.75em;overflow-y: scroll;height: 78vh !important;">
        <div class="rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="px-0">
                <div class="bg-white">
                    <span style="margin-left: 2em; color: dimgrey">Vos conversations personnelles</span>
                    <hr class="mx-5 my-2">
                    <div class="messages-box">
                        <div class="list-group mx-sm-2 mx-lg-4 rounded-0">
                            <!-- Conversations personnelles -->
                            @foreach($personalLastMessages as $lastMessage)
                                @foreach($personalInfoConversations as $infoConversation)
                                    @if($lastMessage->sender == $infoConversation->id || $lastMessage->receiver == $infoConversation->id)
                                        <div
                                            @if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()) style="border-bottom-width: 2px;border-bottom-color:{{setting('openmeet.color')}} " @endif class="card border-bottom-fmm mb-1">
                                            <a href="/messages/user/{{$infoConversation->id}}" class="list-group-item list-group-item-action">
                                                @if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id())
                                                    <span
                                                        class="badge badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                            @endif
                                                <div class="media">
                                                    <div class="mask">
                                                        @if($infoConversation->picname != null & $infoConversation->picname != '')
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo de {{$infoConversation->fname}} {{$infoConversation->lname}}"
                                                                 src="#">
                                                        @else
                                                            <i class="fas fa-user fa-2x"></i>
                                                            <div style="margin-right: -5px;">
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: -0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">
                                                            <h6 class="mb-0"> {{$infoConversation->fname}} {{$infoConversation->lname}} </h6>
                                                        </div>
                                                        <p class="font-italic mb-0 text-small">
                                                            {{ $lastMessage->content}}
                                                        </p>
                                                        <small style="color: dimgrey"
                                                               class="small font-weight-lighter"> {{$lastMessage->date}}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        <!-- Conversations de groupe -->
                            <span style="margin-left: 2em; color: dimgrey">Vos conversations de groupe</span>
                            <hr class="mx-5 my-2">
                            @foreach($groupLastMessages as $lastMessage)
                                @foreach($groupInfoConversations as $infoConversation)
                                    @if($lastMessage->receiver == $infoConversation->id)
                                        <div
                                            @if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()) style="border-bottom-color: {{setting('openmeet.color')}};border-bottom-width: 2px;"
                                            @endif class="card border-bottom-fmm mb-1">

                                            <a href="/messages/group/{{$lastMessage->receiver}}" class="list-group-item list-group-item-action">
                                                @if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id())
                                                    <span
                                                        class="badge badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                            @endif
                                                <div class="media">
                                                    <div class="mask">
                                                        @if($infoConversation->picname != null && $infoConversation->picname != '')
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo du groupe : {{$infoConversation->name}}"
                                                                 src="{{url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)}}">
                                                        @else
                                                            <i class="fas fa-users fa-2x"></i>
                                                            <div>
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: 0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">

                                                            <h6 class="mb-0">{{$infoConversation->name}} </h6>

                                                        </div>
                                                        <p class="font-italic mb-0 text-small">
                                                            @foreach($groupLastMessageInfo as $lastMessageInfo)
                                                                @if($lastMessageInfo->id == $lastMessage->sender)
                                                                    <span>{{$lastMessageInfo->fname}} {{$lastMessageInfo->lname}} : </span> {{ $lastMessage->content}}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        @if($lastMessage->sender != 0)
                                                            <small style="color: dimgrey"
                                                                   class="small font-weight-lighter"> {{$lastMessage->date}}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            @foreach($groupWithoutLastMessage as $withoutMessage)
                                @foreach($groupInfoConversations as $infoConversation)
                                    @if($infoConversation->id == $withoutMessage->receiver)
                                        <div class="card border-bottom-fmm mb-1">
                                            <a class="list-group-item list-group-item-action" href="/messages/group/{{$infoConversation->id}}">
                                                <div class="media">
                                                    <div class="mask">
                                                        @if($infoConversation->picname != null && $infoConversation->picname != '')
                                                            <img width="50" style="top:50%"
                                                                 alt="Photo du groupe : {{$infoConversation->name}}"
                                                                 src="{{url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)}}">
                                                        @else
                                                            <i class="fas fa-users fa-2x"></i>
                                                            <div>
                                                                <small
                                                                    style="text-align: center;margin-left: -15px;margin-right: 0px; color: dimgrey;font-size: smaller">pas
                                                                    de photo</small>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="media-body ml-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-1">

                                                            <h6 class="mb-0">{{$infoConversation->name}} </h6>

                                                        </div>
                                                        <p style="color: dimgrey" class="font-italic mb-0 text-small">
                                                            {{ $withoutMessage->content}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
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

        .translate {
            margin-left: 0.5em;
            transition: all 0.3s;
        }

        .card {
            transition: all 0.3s;
        }
        .extended {
            width: 65vw;
            transition: all 0.5s;
        }

        .unextended {
            width: 35vw;
            transition: all 0.5s;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            width: 5px;
            background: #f5f5f5;
        }

        ::-webkit-scrollbar-thumb {
            width: 1em;
            background-color: {{setting('openmeet.color')}};
            outline: 1px solid slategrey;
            border-radius: 1rem;
        }
    </style>

@endsection
@section('js')
    <script>

    </script>
@endsection

