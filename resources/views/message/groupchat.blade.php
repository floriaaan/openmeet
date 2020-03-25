@extends('layouts.nav')

@section('title')
    Messages
@endsection

@section('content')
    <!--================================================
     List des conversation
     ================================================-->
    <div class="container-fluid">
        <div id="listConversationsContainer" class="container extended"
             style="margin-left: -1.75em;overflow-y: scroll;height: 78vh;">
            <div class="rounded-lg overflow-hidden shadow">
                <!-- Users box-->
                <div class="px-0">
                    <div id="listConversations" class="bg-white">
                        <span class="textTypeConversation" style="margin-left: 2em; color: dimgrey">Vos conversations personnelles</span>
                        <hr class="mx-5 my-2">
                        <div class="messages-box">
                            <div class="list-group mx-sm-2 mx-lg-4 rounded-0">
                                <!-- Conversations personnelles -->
                                @foreach($personalLastMessages as $lastMessage)
                                    @foreach($personalInfoConversations as $infoConversation)
                                        @if($lastMessage->sender == $infoConversation->id || $lastMessage->receiver == $infoConversation->id)
                                            <div
                                                style="@if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()) border-bottom-width: 2px;border-bottom-color:{{setting('openmeet.color')}} @endif "
                                                class="card border-bottom-fmm mb-1">
                                                <a style="height: 15vh;overflow: hidden"
                                                   href="/messages/user/{{$infoConversation->id}}"
                                                   class="list-group-item list-group-item-action">
                                                    @if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id())
                                                        <span
                                                            class="badge badge-mes badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                                    @endif
                                                    <div class="media">
                                                        <div class="mask">
                                                            @if($infoConversation->picname != null & $infoConversation->picname != '')
                                                                <img width="50" style="top:50%"
                                                                     alt="Photo de {{$infoConversation->fname}} {{$infoConversation->lname}}"
                                                                     src="#">
                                                            @else
                                                                <i class="fas fa-user fa-2x"></i>
                                                                <div class="textNoPhoto" style="margin-right: -5px;">
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
                                                            <p style="overflow: hidden;height: 3vh;"
                                                               class="font-italic mb-0 text-small lastMessageContent">
                                                                {{ $lastMessage->content}}
                                                            </p>
                                                            <small style="color: dimgrey"
                                                                   class="small font-weight-lighter lastMessageDate"> {{$lastMessage->date}}</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            <!-- Conversations de groupe -->
                                <span class="textTypeConversation mt-2" style="margin-left: 2em; color: dimgrey">Vos conversations de groupe</span>
                                <hr class="mx-5 my-2">
                                @foreach($groupLastMessages as $lastMessage)
                                    @foreach($groupInfoConversations as $infoConversation)
                                        @if($lastMessage->receiver == $infoConversation->id)
                                            <div
                                                @if($lastMessage->isread == 0 && $lastMessage->sender != auth()->id()) style="border-bottom-color: {{setting('openmeet.color')}};border-bottom-width: 2px;"
                                                @endif class="card border-bottom-fmm mb-1">

                                                <a href="/messages/group/{{$lastMessage->receiver}}"
                                                   class="list-group-item list-group-item-action">
                                                    @if($lastMessage->isread ==0 && $lastMessage->sender != auth()->id())
                                                        <span
                                                            class="badge badge-mes badge-pill badge-danger openmeet-badge mr-2 mt-1">Nouveau message</span>
                                                    @endif
                                                    <div class="media">
                                                        <div class="mask">
                                                            @if($infoConversation->picname != null && $infoConversation->picname != '')
                                                                <img width="50" style="top:50%"
                                                                     alt="Photo du groupe : {{$infoConversation->name}}"
                                                                     src="{{url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)}}">
                                                            @else
                                                                <i class="fas fa-users fa-2x"></i>
                                                                <div class="textNoPhoto">
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
                                                            @foreach($groupLastMessagesInfo as $lastMessageInfo)
                                                                @if($lastMessageInfo->id == $lastMessage->sender)
                                                                    <p style="height: 3vh; overflow: hidden"
                                                                       class="font-italic mb-0 text-small lastMessageContent">
                                                                        {{$lastMessage->content}}
                                                                    </p>
                                                                @endif
                                                            @endforeach
                                                            @if($lastMessage->sender != 0)
                                                                <small style="color: dimgrey"
                                                                       class="small font-weight-lighter lastMessageDate"> {{$lastMessage->date}}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                                <span class="textTypeConversation mt-2" style="margin-left: 2em; color: dimgrey">Autres groupes</span>
                                <hr class="mx-5 my-2">
                                @foreach($groupWithoutLastMessage as $withoutMessage)
                                    @foreach($groupInfoConversations as $infoConversation)
                                        @if($infoConversation->id == $withoutMessage->receiver)
                                            <div class="card-withoutMessage card border-bottom-fmm mb-1">
                                                <a class="list-group-item list-group-item-action"
                                                   href="/messages/group/{{$infoConversation->id}}">
                                                    <div class="media">
                                                        <div class="mask">
                                                            @if($infoConversation->picname != null && $infoConversation->picname != '')
                                                                <img width="50" style="top:50%"
                                                                     alt="Photo du groupe : {{$infoConversation->name}}"
                                                                     src="{{url('/storage/upload/image/'.$infoConversation->picrepo.'/'.$infoConversation->picname)}}">
                                                            @else
                                                                <i class="fas fa-users fa-2x"></i>
                                                                <div class="textNoPhoto">
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
                                                            <p style="color: dimgrey"
                                                               class="font-italic mb-0 text-small withoutMessageContent">
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
        <!--================================================
         List des messages
        ================================================-->
        <div class="px-4 chat-box bg-white unextended" id="chatbox">

        @foreach($listMessages as $message)
            @foreach($usersInfos as $userInfo)

                @if($message->sender == $userInfo->id)
                    @if($message->sender != auth()->id())
                        <!-- Message Reçu-->
                            <div class="media w-50 mt-3">
                                <div class="mask"><a href="#" style="text-decoration: none;" class="no-hover">
                                        @if($userInfo->picname != null & $userInfo->picname != '')
                                            <img width="50" style="top:50%"
                                                 alt="Photo de {{$userInfo->fname}} {{$userInfo->lname}}"
                                                 src="#">
                                        @else
                                            <i style="color: {{setting('openmeet.color')}}"
                                               class="fas fa-user fa-2x"></i>
                                        @endif
                                    </a>
                                </div>

                                <div class="oneMessage media-body ml-3">
                                    <a href="{{url('/user/show/'.$userInfo->id)}}" style="text-decoration: none;"
                                       class="no-hover">
                                        <p style="color: gray; font-weight: bold">{{$userInfo->fname}} {{$userInfo->lname}}</p>

                                        <div>
                                            <a href="{{url('/user/report/'.$userInfo->id)}}"
                                               style="text-decoration: none;">
                                                <i class="fas fa-radiation"></i>
                                            </a>
                                            <a href="{{url('/user/block/'.$userInfo->id)}}"
                                               style="text-decoration: none;">
                                                <i class="fas fa-shield-alt"></i>
                                            </a>

                                                @if($groupInfo->admin == auth()->id())

                                                    <a href="{{url('/user/ban/')}}/{{$groupInfo->id}}/{{$userInfo->id}}"
                                                       style="text-decoration: none;">
                                                        <i class="fas fa-ban"></i>
                                                    </a>

                                                @endif

                                        </div>


                                    </a>
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">{{$message->content}}</p>
                                    </div>
                                    <p class="small text-muted">{{$message->date}}</p>
                                </div>
                            </div>
                    @else
                        <!-- Messages envoyé -->
                            <div class="media w-50 ml-auto mt-3">
                                <div class="oneMessage media-body">
                                    <div style="background-color: {{setting('openmeet.color')}}"
                                         class="bg-fmm rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-white">{{$message->content}}</p>
                                    </div>
                                    <p class="small text-muted">{{$message->date}}</p>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach


            <hr class="mx-5 my-2">

            <div class="p-fixed">
                <form action="/messages/create" method="post" class="bg-light">
                    @csrf
                    <div class="input-group">
                        <a href="/messages/" class="btn btn-link my-auto"><i class="fas fa-chevron-circle-left"></i></a>
                        <input value="" type="text" name="mContent" placeholder="Envoyer un message"
                               aria-describedby="button-addon2"
                               class="form-control rounded-0 border-0 py-4 bg-light" required>
                        <div class="input-group-append">
                            <button id="button-addon2" type="submit" class="btn btn-link"><i
                                    style="color: {{setting('openmeet.color')}}" class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="mReceiver" value="{{$groupInfo->id}}">
                    <input type="hidden" name="mForgroup" value="1">
                </form>
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

        #chatbox {
            height: 78vh;
            overflow-y: scroll;
            position: absolute;
            margin-top: -78vh;
            right: 1vw !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
            margin-left: -12px;
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

        .text-small {
            font-size: 0.9rem;
        }

        .messages-box,
        .chat-box {
            padding-bottom: 5vh;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #999;
        }

        .badge-mes {
            font-size: 0;
            width: 13px;
            height: 13px;
        }

        .extended .oneMessage {
            width: 60vw !important;
        }

        @media (max-device-width: 600px ) {

            .unextended .textNoPhoto {
                display: none;
            }

            .unextended .lastMessageDate {
                display: none;
            }

            .unextended .lastMessageContent {
                display: none;
            }

            .unextended .card {
                height: 10vh;
                max-height: 10vh;
            }

            .unextended .card card-withoutMessage {
                height: 10vh;
                max-height: 10vh;
                background-color: dimgrey;
            }

            .extended {
                width: 80vw;
                transition: all 0.5s;
            }

            .unextended {
                width: 20vw;
                transition: all 0.5s;
            }

            .badge-mes {
                font-size: 0;
                width: 8px;
                height: 8px;
            }

            .unextended h6 {
                display: none;
            }

            .textTypeConversation {
                display: none;
            }

            .unextended .withoutMessageContent {
                display: none;
            }
        }
    </style>


@endsection
@section('js')
    <script>

        window.onload = function () {
            var chatbox = document.getElementById("chatbox");
            chatbox.scrollTop = chatbox.scrollHeight;
            chatbox.focus();

            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');


        };


        document.getElementById('listConversations').addEventListener('mouseover', function e() {
            document.getElementById('listConversationsContainer').classList.add('extended');
            document.getElementById('listConversationsContainer').classList.remove('unextended');
            document.getElementById('chatbox').classList.remove('extended');
            document.getElementById('chatbox').classList.add('unextended');
        });

        document.getElementById('listConversations').addEventListener('touchstart', function e() {
            document.getElementById('listConversationsContainer').classList.add('extended');
            document.getElementById('listConversationsContainer').classList.remove('unextended');
            document.getElementById('chatbox').classList.remove('extended');
            document.getElementById('chatbox').classList.add('unextended');
        });


        document.getElementById('chatbox').addEventListener('mouseover', function e() {
            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');
        });

        document.getElementById('chatbox').addEventListener('touchstart', function e() {
            document.getElementById('listConversationsContainer').classList.remove('extended');
            document.getElementById('listConversationsContainer').classList.add('unextended');
            document.getElementById('chatbox').classList.add('extended');
            document.getElementById('chatbox').classList.remove('unextended');
        });

    </script>
@endsection
