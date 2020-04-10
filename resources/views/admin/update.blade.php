@extends('layouts.nav')

@section('title')
    Mise à jour OpenMeet
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <div class="container p-3">

        <div class="card p-3">
            <kbd>
                <div class="container" id="console" style="height: 60vh">
                    <p id="console-log"></p>
                    <hr class="mx-3 my-2">
                    <p id="console-log-update"></p>
                    <!--<span class="blinking">_</span>-->
                </div>


            </kbd>

            <div class="row justify-content-end p-2 mr-1">
                <button class="btn btn-outline-dark mt-2" onclick="postUpdate()" id="btn-update">
                    <i class="fas fa-cloud-download-alt"></i>
                    Mettre à jour le système OpenMeet
                </button>

            </div>

        </div>

    </div>

@endsection

@section('css')
    <style>

        @keyframes blink {
            50% {
                background-color: #ffffff;
            }
        }

        .blinking {
            width: 7px;
            height: 12px;
            animation: blink .5s step-end infinite alternate;
        }
    </style>
@endsection

@section('js')
    <script>


        $.ajax({
            url: 'https://api.github.com/repos/floriaaan/openmeet/commits/master',
            type: 'GET',
            success: function (data) {
                let options = {
                    strings: [
                        'Last commit : ' + data.commit.tree.sha + ' authored by : ' + data.commit.author.name + ' on : ' + data.commit.author.date,
                        'Message was : ' + data.commit.message,
                        'Stats | Addition(s) : ' + data.stats.additions + ' - Deletion(s) : ' + data.stats.deletions
                    ],
                    typeSpeed: 40,
                    backSpeed: 0,
                    loop: true
                };

                let github = new Typed('#console-log', options);

            },
            error: function (data) {
                let options = {
                    strings: ['404 | ERROR'],
                    typeSpeed: 100
                };

                let github = new Typed('#console-log', options);
            }
        });


        function postUpdate() {
            if(!$('#btn-update').hasClass('disabled')) {
                $.ajax({
                    url: '{{url('/api/v1/admin/update')}}',
                    type: 'POST',
                    data: {'token': '{{auth()->user()->apitoken}}'},
                    success: function (data) {

                        let options = {
                            strings: [data],
                            typeSpeed: 5
                        };

                        let typed = new Typed('#console-log-update', options);
                        $('#btn-update').addClass('disabled');

                    },
                    error: function (data) {
                        let options = {
                            strings: ['404 | ERROR'],
                            typeSpeed: 100
                        };

                        let typed = new Typed('#console-log-update', options);
                    }
                });
            }

        }
    </script>
@endsection
