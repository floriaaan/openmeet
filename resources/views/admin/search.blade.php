@extends('layouts.nav')

@section('title')
    Super-Recherche
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-between">
            <h3 class="display-4 my-auto">Recherche correspondante à : {{$search}}</h3>
            <svg id="9a5c15f4-7944-40bc-b8da-d63b7d478a28" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" width="150" height="150" viewBox="0 0 842 778.92">
                <defs>
                    <linearGradient id="a91ba363-77be-43f7-9cf6-91c4a3880d9c" x1="378.37" y1="732.81" x2="378.37"
                                    y2="130.21" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="gray" stop-opacity="0.25"/>
                        <stop offset="0.54" stop-color="gray" stop-opacity="0.12"/>
                        <stop offset="1" stop-color="gray" stop-opacity="0.1"/>
                    </linearGradient>
                    <linearGradient id="d1e6aa0e-d79d-4f6f-afbb-c37e9ed80ff9" x1="274.44" y1="409.32" x2="274.44"
                                    y2="248.16" xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <linearGradient id="a279b039-1afd-4281-8292-ccd5c8c9b734" x1="274.44" y1="361.44" x2="274.44"
                                    y2="261.01" xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <clipPath id="42e7b1d1-2be2-47b0-aacb-a853df270819" transform="translate(-179 -60.54)">
                        <rect id="cf34cfb5-9399-4bae-9cea-d47bbef6cb3a" data-name="&lt;Rectangle&gt;" x="381.54"
                              y="322.72" width="143.79" height="96.93" fill="#fff"/>
                    </clipPath>
                    <linearGradient id="972637f2-71db-4198-9c75-a0854a7fe249" x1="274.44" y1="616.03" x2="274.44"
                                    y2="454.87" xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <linearGradient id="6c85befd-f960-412c-83e0-663d4b13bf85" x1="274.44" y1="568.15" x2="274.44"
                                    y2="467.72" xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <clipPath id="f66b8fac-771d-49bf-85c7-4ce29a79f723" transform="translate(-179 -60.54)">
                        <rect id="7439734d-5f7c-428f-88ce-e68b86a45c07" data-name="&lt;Rectangle&gt;" x="381.54"
                              y="529.42" width="143.79" height="96.93" fill="#fff"/>
                    </clipPath>
                    <linearGradient id="598f8edf-c762-4b18-b52d-250fc678075a" x1="688.76" y1="765.86" x2="688.76"
                                    y2="163.26" gradientTransform="translate(1142.22 -188.53) rotate(90)"
                                    xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <linearGradient id="013b841e-9a42-49b8-8a36-6db9ed002b72" x1="688.18" y1="568.49" x2="688.18"
                                    y2="409.67" gradientTransform="translate(1161.39 -164.01) rotate(90)"
                                    xlink:href="#a91ba363-77be-43f7-9cf6-91c4a3880d9c"/>
                    <linearGradient id="f8cab3c1-d868-48bc-b87d-cd2075ddc26a" x1="810.6" y1="767.54" x2="810.6"
                                    y2="362.71" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#b3b3b3" stop-opacity="0.25"/>
                        <stop offset="0.54" stop-color="#b3b3b3" stop-opacity="0.1"/>
                        <stop offset="1" stop-color="#b3b3b3" stop-opacity="0.05"/>
                    </linearGradient>
                    <linearGradient id="043d467e-585e-47c7-bb2c-06dd6f5be04b" x1="685.49" y1="507.08" x2="685.49"
                                    y2="487.6" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-opacity="0.12"/>
                        <stop offset="0.55" stop-opacity="0.09"/>
                        <stop offset="1" stop-opacity="0.02"/>
                    </linearGradient>
                    <linearGradient id="be08032f-102d-431e-9b5f-1e4ebfc8159b" x1="774.99" y1="484.73" x2="774.99"
                                    y2="425.15" xlink:href="#043d467e-585e-47c7-bb2c-06dd6f5be04b"/>
                </defs>
                <title>file searching</title>
                <g opacity="0.5">
                    <rect x="154.15" y="130.21" width="448.44" height="602.6"
                          fill="url(#a91ba363-77be-43f7-9cf6-91c4a3880d9c)"/>
                </g>
                <rect x="159.99" y="138.39" width="434.43" height="581.58" fill="#f2f2f2"/>
                <rect x="193.86" y="162.91" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="193.86" y="183.93" width="149.48" height="4.67" fill="var(--openmeet)" opacity="0.7"/>
                <rect x="365.53" y="162.91" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="388.88" y="296.05" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="392.39" y="308.89" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="399.4" y="321.74" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="388.88" y="502.75" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="392.39" y="515.6" width="149.48" height="4.67" fill="#e0e0e0"/>
                <rect x="399.4" y="528.44" width="149.48" height="4.67" fill="#e0e0e0"/>
                <g opacity="0.5">
                    <rect x="195.03" y="248.16" width="158.82" height="161.16"
                          fill="url(#d1e6aa0e-d79d-4f6f-afbb-c37e9ed80ff9)"/>
                </g>
                <rect x="196.03" y="251.67" width="156.32" height="154.15" fill="#f5f5f5"/>
                <g opacity="0.5">
                    <rect x="201.54" y="261.01" width="145.8" height="100.43"
                          fill="url(#a279b039-1afd-4281-8292-ccd5c8c9b734)"/>
                </g>
                <rect id="e1f34465-d008-41db-868b-e00503fb87b3" data-name="&lt;Rectangle&gt;" x="202.54" y="262.18"
                      width="143.79" height="96.93" fill="#fff"/>
                <g clip-path="url(#42e7b1d1-2be2-47b0-aacb-a853df270819)">
                    <polygon
                        points="190.35 355.61 226.56 299.55 241.74 324.07 274.44 290.21 302.47 324.07 326.99 273.86 390.05 374.29 185.68 367.28 190.35 355.61"
                        fill="var(--openmeet)" opacity="0.4"/>
                    <circle cx="218.38" cy="276.19" r="10.51" fill="var(--openmeet)" opacity="0.4"/>
                </g>
                <g opacity="0.5">
                    <rect x="195.03" y="454.87" width="158.82" height="161.16"
                          fill="url(#972637f2-71db-4198-9c75-a0854a7fe249)"/>
                </g>
                <rect x="196.03" y="458.37" width="156.32" height="154.15" fill="#f5f5f5"/>
                <g opacity="0.5">
                    <rect x="201.54" y="467.72" width="145.8" height="100.43"
                          fill="url(#6c85befd-f960-412c-83e0-663d4b13bf85)"/>
                </g>
                <rect id="c95ac4f6-be4d-44a3-92c2-5c8066e2b531" data-name="&lt;Rectangle&gt;" x="202.54" y="468.88"
                      width="143.79" height="96.93" fill="#fff"/>
                <g clip-path="url(#f66b8fac-771d-49bf-85c7-4ce29a79f723)">
                    <polygon
                        points="190.35 562.31 226.56 506.25 241.74 530.78 274.44 496.91 302.47 530.78 326.99 480.56 390.05 580.99 185.68 573.99 190.35 562.31"
                        fill="#bdbdbd" opacity="0.4"/>
                    <circle cx="218.38" cy="482.9" r="10.51" fill="#bdbdbd" opacity="0.4"/>
                </g>
                <g opacity="0.5">
                    <rect x="376.36" y="276.01" width="602.6" height="448.44"
                          transform="translate(-124.09 1006.82) rotate(-78.76)"
                          fill="url(#598f8edf-c762-4b18-b52d-250fc678075a)"/>
                </g>
                <rect x="386.18" y="280.49" width="581.58" height="434.43"
                      transform="translate(-122.17 1004.12) rotate(-78.76)" fill="#fff"/>
                <rect x="542.89" y="232.65" width="308.31" height="4.67"
                      transform="translate(-119.81 -191.93) rotate(11.24)" fill="#e0e0e0"/>
                <rect x="456.83" y="665.62" width="308.31" height="4.67"
                      transform="translate(-37.05 -166.84) rotate(11.24)" fill="#e0e0e0"/>
                <rect x="452.26" y="685.13" width="238.24" height="4.67"
                      transform="translate(-34.01 -158.75) rotate(11.24)" fill="#e0e0e0"/>
                <rect x="448.46" y="696.91" width="88.75" height="4.67"
                      transform="translate(-33.22 -143.21) rotate(11.24)" fill="var(--openmeet)" opacity="0.7"/>
                <rect x="539.13" y="243.97" width="154.15" height="4.67"
                      transform="translate(-119.16 -175.95) rotate(11.24)" fill="var(--openmeet)" opacity="0.7"/>
                <rect x="532.71" y="282.38" width="277.94" height="4.67"
                      transform="translate(-110.6 -186.03) rotate(11.24)" fill="#e0e0e0"/>
                <rect x="529.49" y="288.24" width="67.73" height="4.67"
                      transform="translate(-111.54 -164.8) rotate(11.24)" fill="#3ad29f" opacity="0.7"/>
                <rect x="521.95" y="338.03" width="308.31" height="4.67"
                      transform="translate(-99.67 -185.82) rotate(11.24)" fill="#e0e0e0"/>
                <g opacity="0.5">
                    <rect x="592.89" y="385.78" width="158.82" height="276.77"
                          transform="translate(-151.88 1020.84) rotate(-78.76)"
                          fill="url(#013b841e-9a42-49b8-8a36-6db9ed002b72)"/>
                </g>
                <rect x="535.78" y="445.94" width="273.27" height="155.32"
                      transform="translate(-64.02 -181.59) rotate(11.24)" fill="#fff"/>
                <rect x="516.71" y="364.38" width="308.31" height="4.67"
                      transform="translate(-94.63 -184.29) rotate(11.24)" fill="#e0e0e0"/>
                <rect x="566.14" y="449.2" width="33.87" height="113.28"
                      transform="translate(-69.19 -164.51) rotate(11.24)" fill="var(--openmeet)"/>
                <rect x="622.06" y="498.05" width="33.87" height="75.91"
                      transform="translate(-62.24 -174.83) rotate(11.24)" fill="#3ad29f"/>
                <rect x="678.21" y="544.59" width="33.87" height="40.87"
                      transform="translate(-55.5 -185.22) rotate(11.24)" fill="#f55f44"/>
                <rect x="741.87" y="514.79" width="33.87" height="82.92"
                      transform="translate(-55.99 -197.8) rotate(11.24)" fill="#fdd835"/>
                <path
                    d="M880.45,410.55a155.89,155.89,0,0,0-223.11-1.68c-59,59.48-60,156.33-2.29,217.07A155.89,155.89,0,0,0,854.95,648L967.64,765.21a7.59,7.59,0,0,0,10.73.21l28.08-27a7.59,7.59,0,0,0,.21-10.73L894,610.49A155.9,155.9,0,0,0,880.45,410.55ZM845.35,599a111.5,111.5,0,1,1,3.1-157.66A111.5,111.5,0,0,1,845.35,599Z"
                    transform="translate(-179 -60.54)" fill="url(#f8cab3c1-d868-48bc-b87d-cd2075ddc26a)"/>
                <path d="M685.49,487.6c-12.54,0-12.56,19.49,0,19.49S698.05,487.6,685.49,487.6Z"
                      transform="translate(-179 -60.54)" fill="url(#043d467e-585e-47c7-bb2c-06dd6f5be04b)"/>
                <path
                    d="M772.9,425.17c-33.75-.76-64.46,16.17-80.79,41.73-5.33,8.34,9.8,15.71,15.1,7.41,13.52-21.16,39.21-34.6,67-33.9,29.12.73,55.62,17.39,69.65,40.51,5.32,8.77,19.27.8,14-7.92C840.8,445,807.76,426,772.9,425.17Z"
                    transform="translate(-179 -60.54)" fill="url(#be08032f-102d-431e-9b5f-1e4ebfc8159b)"/>
                <path
                    d="M892.68,404.63a155.89,155.89,0,0,0-223.11-1.68c-59,59.48-60,156.33-2.29,217.07a155.89,155.89,0,0,0,199.9,22.05L979.86,759.29a7.59,7.59,0,0,0,10.73.21l28.08-27a7.59,7.59,0,0,0,.21-10.73L906.19,604.56A155.9,155.9,0,0,0,892.68,404.63ZM857.58,593a111.5,111.5,0,1,1,3.1-157.66A111.5,111.5,0,0,1,857.58,593Z"
                    transform="translate(-179 -60.54)" fill="var(--openmeet)"/>
                <path d="M697.72,481.67c-12.54,0-12.56,19.49,0,19.49S710.28,481.67,697.72,481.67Z"
                      transform="translate(-179 -60.54)" fill="var(--openmeet)"/>
                <path
                    d="M785.13,419.25c-33.75-.76-64.46,16.17-80.79,41.73-5.33,8.34,9.8,15.71,15.1,7.41,13.52-21.16,39.21-34.6,67-33.9,29.12.73,55.62,17.39,69.65,40.51,5.32,8.77,19.27.8,14-7.92C853,439,820,420,785.13,419.25Z"
                    transform="translate(-179 -60.54)" fill="var(--openmeet)"/>
                <rect x="121.45" y="663.91" width="3.5" height="19.85" fill="#47e6b1"/>
                <rect x="300.45" y="724.45" width="3.5" height="19.85" transform="translate(857.58 371.63) rotate(90)"
                      fill="#47e6b1"/>
                <path
                    d="M750.87,68.49a4.29,4.29,0,0,1-2.39-5.19,2.06,2.06,0,0,0,.09-.48h0a2.15,2.15,0,0,0-3.87-1.43h0a2.06,2.06,0,0,0-.24.42,4.29,4.29,0,0,1-5.19,2.39,2.06,2.06,0,0,0-.48-.09h0A2.15,2.15,0,0,0,737.38,68h0a2.06,2.06,0,0,0,.42.24,4.29,4.29,0,0,1,2.39,5.19,2.06,2.06,0,0,0-.09.48h0A2.15,2.15,0,0,0,744,75.32h0a2.06,2.06,0,0,0,.24-.42,4.29,4.29,0,0,1,5.19-2.39,2.06,2.06,0,0,0,.48.09h0a2.15,2.15,0,0,0,1.43-3.87h0A2.06,2.06,0,0,0,750.87,68.49Z"
                    transform="translate(-179 -60.54)" fill="#4d8af0"/>
                <path
                    d="M316.44,215.64a4.29,4.29,0,0,1-2.39-5.19,2.06,2.06,0,0,0,.09-.48h0a2.15,2.15,0,0,0-3.87-1.43h0a2.06,2.06,0,0,0-.24.42,4.29,4.29,0,0,1-5.19,2.39,2.06,2.06,0,0,0-.48-.09h0a2.15,2.15,0,0,0-1.43,3.87h0a2.06,2.06,0,0,0,.42.24,4.29,4.29,0,0,1,2.39,5.19,2.06,2.06,0,0,0-.09.48h0a2.15,2.15,0,0,0,3.87,1.43h0a2.06,2.06,0,0,0,.24-.42,4.29,4.29,0,0,1,5.19-2.39,2.06,2.06,0,0,0,.48.09h0a2.15,2.15,0,0,0,1.43-3.87h0A2.06,2.06,0,0,0,316.44,215.64Z"
                    transform="translate(-179 -60.54)" fill="#fdd835"/>
                <path
                    d="M934.22,822.9a4.29,4.29,0,0,1-2.39-5.19,2.06,2.06,0,0,0,.09-.48h0a2.15,2.15,0,0,0-3.87-1.43h0a2.06,2.06,0,0,0-.24.42,4.29,4.29,0,0,1-5.19,2.39,2.06,2.06,0,0,0-.48-.09h0a2.15,2.15,0,0,0-1.43,3.87h0a2.06,2.06,0,0,0,.42.24,4.29,4.29,0,0,1,2.39,5.19,2.06,2.06,0,0,0-.09.48h0a2.15,2.15,0,0,0,3.87,1.43h0a2.06,2.06,0,0,0,.24-.42,4.29,4.29,0,0,1,5.19-2.39,2.06,2.06,0,0,0,.48.09h0a2.15,2.15,0,0,0,1.43-3.87h0A2.06,2.06,0,0,0,934.22,822.9Z"
                    transform="translate(-179 -60.54)" fill="#fdd835"/>
                <circle cx="321.15" cy="75.33" r="7.01" fill="#f55f44"/>
                <circle cx="823.31" cy="162.91" r="7.01" fill="#f55f44"/>
                <circle cx="783.61" cy="371.95" r="7.01" fill="#4d8af0"/>
                <circle cx="7.01" cy="28.61" r="7.01" fill="#47e6b1" opacity="0.5"/>
            </svg>

        </div>
    </div>

    <div class="container-fluid p-5">

        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="users">
                    <label class="custom-control-label" for="users">Utilisateurs</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="groups">
                    <label class="custom-control-label" for="groups">Groupes</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="events">
                    <label class="custom-control-label" for="events">Evenements</label>
                </div>
            </div>
        </div>

        <div class="row mt-lg-3">
            <!--<div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="messages">
                    <label class="custom-control-label" for="messages">Messages</label>
                </div>
            </div>-->
            <div class="col-lg-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked class="custom-control-input" id="signalements">
                    <label class="custom-control-label" for="signalements">Signalements</label>
                </div>
            </div>
        </div>

        <hr class="my-3 mx-5">
        <div class="card-columns">


            @forelse($results as $result)
                @if($result['type'] == 'group')
                    <a href="{{url('/groups/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;" id="groups-{{$loop->index}}">
                        <div class="p-3">
                            <div class="card border-group rounded hvr-grow shadow-sm">

                                @if($result['content']->picname != null)
                                    @if(strpos($result['content']->picrepo, 'https://') !== false)
                                        <img src="{{$result['content']->picrepo.$result['content']->picname}}"
                                             class="card-img hvr-grow" alt="Photo de {{$result['content']->name}}">
                                    @else
                                        <img
                                            src="{{url('/storage/upload/image/'.$result['content']->picrepo.'/'.$result['content']->picname)}}"
                                            class="card-img hvr-grow" alt="Photo de {{$result['content']->name}}">
                                    @endif
                                @else
                                    <small class="p-3 blockquote-footer">Pas de photo</small>
                                @endif


                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->name}}</h5>
                                    <p class="card-text">{!! \Illuminate\Support\Str::limit(str_replace('\\n','<br>',$result['content']->desc), 150, $end='...') !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'event')
                    <a href="{{url('/events/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;" id="events-{{$loop->index}}">
                        <div class="p-3">
                            <div class="card border-event rounded shadow-sm hvr-grow">
                                <div class="card-body">
                                    <div class="media mb-3">
                                        @if($result['content']->picname != null)
                                            <img
                                                src="{{url('/storage/upload/image/'.$result['content']->picrepo.'/'.$result['content']->picname)}}"
                                                class="mr-3 hvr-grow" alt="Photo"
                                                width="auto" height="100px">
                                        @endif
                                        <div class="media-body">
                                            <h5 class="card-title display-4">{{$result['content']->name}}</h5>
                                            @if($result['content']->description != null)
                                                <h5 class="text-muted ml-3 blockquote-footer"> <!--TODO: Fix a href -->
                                                    {{htmlspecialchars(\Illuminate\Support\Str::limit(str_replace('\\n','<br>',$result['content']->description), 150, $end='...'))}}
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            aura lieu le
                                            <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->datefrom))}}
                                                à {{strftime("%R",strtotime($result['content']->datefrom))}}</cite>
                                        </small>
                                        @if($result['content']->dateto != null)
                                            <br>
                                            <small class="text-muted">
                                                jusqu'au
                                                <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->dateto))}}
                                                    à {{strftime("%R",strtotime($result['content']->dateto))}}</cite>
                                            </small>
                                        @endif
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'user')
                    <a href="{{url('/user/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;" id="users-{{$loop->index}}">
                        <div class="p-3">
                            <div class="card border-user rounded shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->fname}} {{$result['content']->lname}}</h5>
                                    <p class="card-text">{{$result['content']->email}}</p>
                                    <footer class="blockquote-footer">
                                        @if($result['content']->isadmin)
                                            <span class="badge badge-pill badge-success">
                                                <i class="fas fa-user-check"></i> Administrateur
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-danger">
                                                <i class="fas fa-user-times"></i> Non administrateur
                                            </span>
                                        @endif
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif($result['type'] == 'message')
                    <div class="p-3" id="messages-{{$loop->index}}">
                        <div class="card rounded border-message shadow-sm hvr-grow">
                            <div class="card-body">
                                <h5 class="card-title">{{$result['content']->content}}</h5>
                                <footer class="blockquote-footer">
                                    <small class="text-muted">
                                        de
                                        <cite>{{$result['sender']->fname}} {{$result['sender']->lname}}</cite>
                                    </small>
                                    <small class="text-muted">
                                        à
                                        @if($result['content']->forgroup)
                                            <cite>{{$result['receiver']->name}}</cite>
                                        @else
                                            <cite>{{$result['receiver']->fname}} {{$result['receiver']->lname}}</cite>
                                        @endif
                                    </small>
                                </footer>
                            </div>
                        </div>
                    </div>

                @elseif($result['type'] == 'signalement')
                    <a href="{{url('/admin/reports/show')}}/{{$result['content']->id}}"
                       style="text-decoration: none; color: inherit;" id="signalements-{{$loop->index}}">
                        <div class="p-3">
                            <div class="card rounded border-signalements shadow-sm hvr-grow">
                                <div class="card-body">
                                    <h5 class="card-title">{{$result['content']->description}}
                                        @if($result['content']->isread)
                                            <span class="badge badge-success">Traité</span>
                                        @else
                                            <span class="badge badge-danger">Non traité</span>
                                        @endif
                                    </h5>
                                    <small class="text-muted">
                                        créé le
                                        <cite>{{strftime("%A %d %b %Y",strtotime($result['content']->date))}}
                                            à {{strftime("%R",strtotime($result['content']->date))}}</cite>
                                    </small>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                            émis par
                                            <cite>{{$result['sender']->fname}} {{$result['sender']->lname}}</cite>
                                        </small>
                                        <small class="text-muted">
                                            pour
                                            <cite>{{$result['receiver']->fname}} {{$result['receiver']->lname}}</cite>
                                        </small>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif

            @empty
                <h2 class="display-4">Aucune donnée pour : {{$search}}</h2>
            @endforelse
        </div>


    </div>

@endsection

@section('js')

    <script>
        $('#users').click(function () {
            $('[id*="users-"]').toggleClass('d-none')
        });

        $('#groups').click(function () {
            $('[id*="groups-"]').toggleClass('d-none')
        });

        $('#events').click(function () {
            $('[id*="events-"]').toggleClass('d-none')
        });

        $('#signalements').click(function () {
            $('[id*="signalements-"]').toggleClass('d-none')
        });

        $('#messages').click(function () {
            $('[id*="messages-"]').toggleClass('d-none')
        });

    </script>
@endsection

@section('css')

    <style>
        .border-group {
            border-bottom: 0.25rem solid var(--openmeet) !important;
        }

        .border-event {
            border-bottom: 0.25rem solid #49bd3a !important;
        }

        .border-user {
            border-bottom: 0.25rem solid #154bbd !important;
        }

        .border-message {
            border-bottom: 0.25rem solid #bd7300 !important;
        }

        .border-signalements {
            border-bottom: 0.25rem solid #bd0028 !important;
        }

        #9a5c15f4-7944-40bc-b8da-d63b7d478a28 {
            width: 150px;
            height: 150px;
        }
    </style>

@endsection
