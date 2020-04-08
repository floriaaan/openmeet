@extends('layouts.nav')

@section('title')
    Alertes
@endsection

@section('content')

    <div class="container-fluid px-5 pt-2">
        <div class="row">

            <div class="col-lg-7 my-2">

                <div class="card shadow-lg p-3">
                    <div class="row justify-content-between align-items-center mx-4">
                        <svg id="5936c596-051a-40af-b9e7-1fcdf2961302" data-name="Layer 1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150"
                             height="150" viewBox="0 0 983.63 745.7">
                            <defs>
                                <linearGradient id="ba9aee23-baa1-4411-9fe4-0580915617e3" x1="420.85" y1="723.28"
                                                x2="420.85" y2="693.5" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="gray" stop-opacity="0.25"/>
                                    <stop offset="0.54" stop-color="gray" stop-opacity="0.12"/>
                                    <stop offset="1" stop-color="gray" stop-opacity="0.1"/>
                                </linearGradient>
                                <linearGradient id="8739f0f8-02d9-4432-8f87-3cf82dfe0a34" x1="530.19" y1="631.15"
                                                x2="530.19" y2="77.15"
                                                xlink:href="#ba9aee23-baa1-4411-9fe4-0580915617e3"/>
                                <linearGradient id="aa9b5458-2d2d-464a-836e-4d64dcd27f19" x1="414" y1="352.05" x2="414"
                                                y2="107.83" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-opacity="0.12"/>
                                    <stop offset="0.55" stop-opacity="0.09"/>
                                    <stop offset="1" stop-opacity="0.02"/>
                                </linearGradient>
                                <linearGradient id="a3b91e71-d117-4cef-9b60-5fdfa21b479e" x1="414" y1="334.64" x2="414"
                                                y2="305.64" xlink:href="#ba9aee23-baa1-4411-9fe4-0580915617e3"/>
                                <linearGradient id="705825ec-b1bb-472c-aa75-ef9fc966de2f" x1="414" y1="296.64" x2="414"
                                                y2="210.64" xlink:href="#ba9aee23-baa1-4411-9fe4-0580915617e3"/>
                                <linearGradient id="5f176dc8-07aa-4396-8169-181014e82da3" x1="966.26" y1="815.71"
                                                x2="966.26" y2="378.25"
                                                gradientTransform="translate(0.2 -14.4) scale(1 1.03)"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.01" stop-color="gray" stop-opacity="0.25"/>
                                    <stop offset="0.54" stop-color="gray" stop-opacity="0.12"/>
                                    <stop offset="1" stop-color="gray" stop-opacity="0.1"/>
                                </linearGradient>
                                <linearGradient id="49755de2-ac10-4a71-89d3-2e7bf6e3c26c" x1="858.27" y1="519.31"
                                                x2="858.27" y2="400.85"
                                                xlink:href="#aa9b5458-2d2d-464a-836e-4d64dcd27f19"/>
                                <linearGradient id="0ffccb3b-4648-4426-a970-7d9f3a6cb9fe" x1="858.27" y1="510.86"
                                                x2="858.27" y2="496.8"
                                                xlink:href="#ba9aee23-baa1-4411-9fe4-0580915617e3"/>
                                <linearGradient id="7d2fdb97-c98e-4205-8a7c-ebf7b6e6fe48" x1="858.27" y1="492.43"
                                                x2="858.27" y2="450.72"
                                                xlink:href="#ba9aee23-baa1-4411-9fe4-0580915617e3"/>
                            </defs>
                            <title>alert</title>
                            <path d="M634.66,582.68s20.89,141,144.11,188H279.61c123.22-47,144.11-188,144.11-188Z"
                                  transform="translate(-108.19 -77.15)" fill="#e0e0e0"/>
                            <rect x="168.91" y="693.5" width="503.87" height="29.78"
                                  fill="url(#ba9aee23-baa1-4411-9fe4-0580915617e3)"/>
                            <rect x="171.42" y="693.5" width="499.16" height="22.97" fill="#f5f5f5"/>
                            <path
                                d="M941.17,77.15h-822a11.12,11.12,0,0,0-11,11.22V610.24a20.72,20.72,0,0,0,20.53,20.91H931.65a20.72,20.72,0,0,0,20.53-20.91V88.37A11.12,11.12,0,0,0,941.17,77.15Z"
                                transform="translate(-108.19 -77.15)"
                                fill="url(#8739f0f8-02d9-4432-8f87-3cf82dfe0a34)"/>
                            <path
                                d="M941.15,545.09H117.22V100A10.75,10.75,0,0,1,128,89.27H930.39A10.75,10.75,0,0,1,941.15,100Z"
                                transform="translate(-108.19 -77.15)" fill="#f5f5f5"/>
                            <path
                                d="M921.1,620.28H137.27a20,20,0,0,1-20-20V545.09H941.15v55.14A20,20,0,0,1,921.1,620.28Z"
                                transform="translate(-108.19 -77.15)" fill="#fff"/>
                            <rect x="50.76" y="68.72" width="745.6" height="348.29" fill="var(--openmeet)"/>
                            <rect x="49.76" y="49.04" width="746.6" height="30.68" fill="#e0e0e0"/>
                            <circle cx="66" cy="64.72" r="9" fill="#ff5252"/>
                            <circle cx="87" cy="64.72" r="9" fill="#ff0"/>
                            <circle cx="108" cy="64.72" r="9" fill="#69f0ae"/>
                            <polygon points="414 107.83 279 352.05 549 352.05 414 107.83"
                                     fill="url(#aa9b5458-2d2d-464a-836e-4d64dcd27f19)"/>
                            <polygon points="414 126.64 295.29 342.64 532.71 342.64 414 126.64" fill="#fff"/>
                            <circle cx="414" cy="320.14" r="14.5" fill="url(#a3b91e71-d117-4cef-9b60-5fdfa21b479e)"/>
                            <circle cx="414" cy="320.14" r="12" fill="var(--openmeet)"/>
                            <rect x="410" y="210.64" width="8" height="86"
                                  fill="url(#705825ec-b1bb-472c-aa75-ef9fc966de2f)"/>
                            <rect x="411.5" y="211.14" width="5" height="84" fill="var(--openmeet)"/>
                            <rect x="841.39" y="373.76" width="250.13" height="448.93" rx="10" ry="10"
                                  transform="translate(-108.99 -75.85) rotate(-0.08)"
                                  fill="url(#5f176dc8-07aa-4396-8169-181014e82da3)"/>
                            <rect x="847.14" y="378.4" width="238.61" height="427.15" rx="10" ry="10"
                                  transform="translate(-108.98 -75.85) rotate(-0.08)" fill="#fff"/>
                            <rect x="874.07" y="408.6" width="184.73" height="347.61"
                                  transform="translate(-108.97 -75.85) rotate(-0.08)" fill="var(--openmeet)"/>
                            <circle cx="966.71" cy="781.25" r="14.73"
                                    transform="translate(-109.24 -75.85) rotate(-0.08)" fill="#dbdbdb"/>
                            <circle cx="938.2" cy="392.43" r="2.95" transform="matrix(1, 0, 0, 1, -108.71, -75.89)"
                                    fill="#dbdbdb"/>
                            <rect x="951.45" y="390.17" width="45.66" height="4.42" rx="1.5" ry="1.5"
                                  transform="translate(-108.71 -75.84) rotate(-0.08)" fill="#dbdbdb"/>
                            <polygon points="858.27 400.85 792.79 519.31 923.75 519.31 858.27 400.85"
                                     fill="url(#49755de2-ac10-4a71-89d3-2e7bf6e3c26c)"/>
                            <polygon points="858.27 409.97 800.69 514.74 915.85 514.74 858.27 409.97" fill="#fff"/>
                            <circle cx="858.27" cy="503.83" r="7.03" fill="url(#0ffccb3b-4648-4426-a970-7d9f3a6cb9fe)"/>
                            <circle cx="858.27" cy="503.83" r="5.82" fill="var(--openmeet)"/>
                            <rect x="856.33" y="450.72" width="3.88" height="41.71"
                                  fill="url(#7d2fdb97-c98e-4205-8a7c-ebf7b6e6fe48)"/>
                            <rect x="857.06" y="450.96" width="2.43" height="40.74" fill="var(--openmeet)"/>
                        </svg>
                        <h4 class="display-4 text-center mt-1">Alertes</h4>
                    </div>

                    <hr class="mx-3 my-2">

                    <div class="table-responsive">

                        <table class="table table-borderless table-hover">
                            <thead class="">
                            <tr>
                                <th scope="col-4">Titre</th>
                                <th scope="col-1">Lien</th>
                                <th scope="col-1">Accueil</th>
                                <th scope="col-1">Groupe</th>
                                <th scope="col-1">Liste des groupes</th>
                                <th scope="col-1">Evenement</th>
                                <th scope="col-1">Couleur</th>
                                <th scope="col-2">Supprimer</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($alerts as $alert)
                                <tr>
                                    <td>{{$alert->title}}</td>
                                    <td>
                                        @if($alert->link != null)
                                            <span class="badge badge-pill badge-light">✅</span>
                                        @else
                                            <span class="badge badge-pill badge-light">❌</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($alert->home)
                                            <span class="badge badge-pill badge-light">✅</span>
                                        @else
                                            <span class="badge badge-pill badge-light">❌</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($alert->group)
                                            <span class="badge badge-pill badge-light">✅</span>
                                        @else
                                            <span class="badge badge-pill badge-light">❌</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($alert->groupList)
                                            <span class="badge badge-pill badge-light">✅</span>
                                        @else
                                            <span class="badge badge-pill badge-light">❌</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($alert->event)
                                            <span class="badge badge-pill badge-light">✅</span>
                                        @else
                                            <span class="badge badge-pill badge-light">❌</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-{{$alert->color}}">Couleur</span>
                                    </td>
                                    <td>
                                        <a onclick="event.preventDefault();document.getElementById('delete-{{$alert->id}}').submit()"
                                           class="btn btn-danger" style="color: white;">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <form action="{{url('/admin/alert/delete/')}}" method="POST" id="delete-{{$alert->id}}"
                                              class="d-none"> @csrf
                                            <input type="hidden" name="alert" value="{{$alert->id}}">
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr class="">
                                    <td>❎ Aucune alerte</td>
                                    <td>❎</td>
                                    <td>❎</td>
                                    <td>❎</td>
                                    <td>❎</td>
                                    <td>❎</td>
                                    <td>❎</td>
                                    <td>❎</td>

                                </tr>
                            @endforelse
                            </tbody>
                        </table>


                    </div>

                </div>

            </div>


            <div class="col-lg-5 my-2">
                <form action="{{url('/admin/alert')}}" method="post">
                    @csrf
                    <div class="card shadow-lg p-5">

                        <div class="form-group my-2">
                            <label for="title">
                                Titre de l'alerte
                            </label>
                            <input type="text" class="form-control form-control-lg" name="title" id="title" required>
                        </div>

                        <div class="form-group my-2">
                            <label for="link">
                                Lien de l'alerte (optionnel)
                            </label>
                            <input type="text" class="form-control" name="link" id="link">
                        </div>

                        <div class="form-group mt-2">
                            <label for="content">
                                Contenu de l'alerte
                            </label>
                            <textarea rows="5" class="form-control" name="content" id="content" required></textarea>
                        </div>

                        <hr class="mx-3 my-4">

                        <div class="row">

                            <div class="col-lg-6 justify-content-center">
                                <p class="text-center">📌 Emplacement de l'alerte</p>
                                <hr class="mx-4 my-1">

                                <div class="custom-control custom-checkbox my-4">
                                    <input type="checkbox" class="custom-control-input" id="home" name="home">
                                    <label class="custom-control-label" for="home">Page Accueil 🏡</label>
                                </div>

                                <div class="custom-control custom-checkbox my-4">
                                    <input type="checkbox" class="custom-control-input" id="group" name="group">
                                    <label class="custom-control-label" for="group">Page Groupe 👨‍👩‍👧‍👦</label>
                                </div>

                                <div class="custom-control custom-checkbox my-4">
                                    <input type="checkbox" class="custom-control-input" id="groupList" name="groupList">
                                    <label class="custom-control-label" for="groupList">Page Liste des groupes
                                        📚</label>
                                </div>

                                <div class="custom-control custom-checkbox my-4">
                                    <input type="checkbox" class="custom-control-input" id="event" name="event">
                                    <label class="custom-control-label" for="event">Page Evenement 📒</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-center">🔴 Couleur de l'alerte</p>
                                <hr class="mx-4 my-1">

                                <div class="custom-control custom-radio my-5">
                                    <input type="radio" id="success" value="success" name="color"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="success">
                                <span class="alert alert-success" role="alert">
                                   Une alerte verte!
                                </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio my-5">
                                    <input type="radio" id="warning" value="warning" name="color"
                                           class="custom-control-input" checked>
                                    <label class="custom-control-label" for="warning">
                                <span class="alert alert-warning" role="alert">
                                    Une alerte jaune!
                                </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mt-5 mb-3">
                                    <input type="radio" id="info" value="info" name="color"
                                           class="custom-control-input">
                                    <label class="custom-control-label w-100" for="info">
                                <span class="alert alert-info" role="alert">
                                    Une alerte bleue!
                                </span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <hr class="mx-5 my-2">

                        <div class="row justify-content-end">
                            <button type="submit" class="btn btn-primary mx-2">Créer une alerte</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('css')
    <style>
        .card {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
@endsection
