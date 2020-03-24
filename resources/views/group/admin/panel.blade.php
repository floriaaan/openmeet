@extends('layouts.nav')

@section('title')
    Administration
@endsection

@section('content')

    <div class="container position-relative" style="height: 100%">
        <div class="row justify-content-between">

            <div class="mx-1">
                <p class="lead">Gestion de {{$group->name}}</p>
            </div>
            <form method="post" action="{{url('/groups/admin/')}}">
                @csrf

                <div class="input-group mt-2">

                    <div class="input-group-prepend">
                        <span class="input-group-text">Groupe</span>
                    </div>

                    <select class="form-control" name="pGroup">
                        @foreach($groupList as $g)

                            <option @if($g->id == $groupChosen) selected
                                    @endif value="{{$g->id}}">{{$g->name}}</option>

                        @endforeach
                    </select>


                    <div class="input-group-append">
                        <button class="btn btn-primary">Valider</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
        <hr class="mx-5 my-2">
    <div class="container-fluid px-5">
        <div class="row p-5" id="events">
            <div class="col-md-4">
                <div class="row">

                    <svg id="53917d2c-59b7-443c-9dc6-ca37ebed1a74" data-name="Layer 1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200"
                         height="200" viewBox="0 0 965.64 800.81">
                        <defs>
                            <linearGradient id="5075b4d4-ce6f-410a-b63e-15cf2dd063e7" x1="478.38" y1="695.72"
                                            x2="478.38" y2="33.2" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="gray" stop-opacity="0.25"/>
                                <stop offset="0.54" stop-color="gray" stop-opacity="0.12"/>
                                <stop offset="1" stop-color="gray" stop-opacity="0.1"/>
                            </linearGradient>
                            <linearGradient id="dee71953-6e04-4c93-a054-139b0acb5af5" x1="1834.21" y1="806.87"
                                            x2="1834.21" y2="194.98" gradientTransform="matrix(-1, 0, 0, 1, 2766, 0)"
                                            xlink:href="#5075b4d4-ce6f-410a-b63e-15cf2dd063e7"/>
                        </defs>
                        <title>events</title>
                        <path
                            d="M1019.06,492.09c-37.09,60-30.14,141.74-13.85,206.19,5.45,21.58,11.73,44.36,7.07,68.51-5.7,29.53-26.48,52.72-47.51,66-38.34,24.15-82.12,23.48-114-1.77-27.53-21.81-45.66-59.85-73.77-80.49-47-34.55-111.54-13.61-167.58,18.68C569.79,792,526.17,821,489.54,804.58c-25.77-11.53-41.84-44.06-49.34-79.46-3.62-17.09-5.81-35.76-14.11-48.78-4.94-7.74-11.73-12.92-18.77-17.17-64.25-38.74-151.18-6.35-213.14-50.22-41.85-29.62-65.64-90.8-73.46-156.22s-1.39-135.42,6.66-204.34c5.73-49,13.48-101.42,39.2-141.27,27.21-42.15,70.1-61,107.38-57s69.65,27.62,97.55,56.49c34.87,36.08,66.32,82.16,111.45,93.8,30.74,7.93,64.31-1.25,97-6.44,54.58-8.68,108.4-6.19,161.84-2.93,51.16,3.12,102.63,7,150.3,25,33.73,12.75,59.62,39.29,91.1,56.55,20.52,11.25,43.67,12.68,62.79,27.68,23.55,18.48,43.93,52.59,34.5,95.71C1071.5,437,1038.74,460.25,1019.06,492.09Z"
                            transform="translate(-117.18 -49.59)" fill="var(--openmeet)" opacity="0.1"/>
                        <path d="M781.67,356.47s101-84.63,123.46-127.3,51.05-79.44,51.05-79.44"
                              transform="translate(-117.18 -49.59)" fill="none" stroke="#535461" stroke-miterlimit="10"
                              stroke-width="2"/>
                        <path d="M942.9,245.12l-43.69-9.85S909.52,281.35,942.9,245.12Z"
                              transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path d="M876.14,198.08l25.14,37.65S852.13,239.28,876.14,198.08Z"
                              transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path d="M960.09,209.73l-39.93-7S945.24,240.88,960.09,209.73Z"
                              transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path d="M901,176.08l19.67,25.76S885.85,205.14,901,176.08Z"
                              transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path d="M940.81,170.95s34,1.62,38,4.87-5.07,22.3-18,19.19S940.81,170.95,940.81,170.95Z"
                              transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path
                            d="M927.22,140.56s13.89,25.31,13.37,30.13-21.17,10.23-25.34-8S927.22,140.56,927.22,140.56Z"
                            transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <circle cx="963.75" cy="154.12" r="9.49"
                                transform="matrix(0.3, -0.95, 0.95, 0.3, 408.68, 976.78)" fill="#ffd037"/>
                        <circle cx="948.9" cy="144.43" r="9.49"
                                transform="matrix(0.3, -0.95, 0.95, 0.3, 407.54, 955.85)" fill="#ffd037"/>
                        <path
                            d="M466.64,688.22S482.85,640,380.09,581.87c0,0-104.34-30.43-93.67-134.93,0,0-120.28,88.12-38.89,200.37s151.64,87.75,151.64,87.75Z"
                            transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <path
                            d="M435.31,710s-50.14-54.19-98.2-75.14A95.71,95.71,0,0,1,311,617.47c-30.64-28-44-70.25-36.1-111l11.55-59.53"
                            transform="translate(-117.18 -49.59)" fill="none" stroke="#535461" stroke-miterlimit="10"
                            stroke-width="2"/>
                        <rect x="193.07" y="33.2" width="570.61" height="662.53"
                              fill="url(#5075b4d4-ce6f-410a-b63e-15cf2dd063e7)"/>
                        <rect x="199.72" y="40.91" width="557.32" height="647.09" fill="#f7f7fd"/>
                        <rect x="233.38" y="113.85" width="140.89" height="11.22" fill="#e2e2ec"/>
                        <rect x="233.38" y="141.28" width="240.63" height="11.22" fill="#e2e2ec"/>
                        <rect x="630.36" y="103.13" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,153.22V238.5H748V153.22h99m1-1H747V239.5H848V152.22Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="103.13" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,153.22V238.5h-99V153.22h99m1-1h-101V239.5H747V152.22Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="630.36" y="190.41" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,240.5v85.28H748V240.5h99m1-1H747v87.28H848V239.5Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="190.41" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,240.5v85.28h-99V240.5h99m1-1h-101v87.28H747V239.5Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="428.38" y="190.41" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M645.05,240.5v85.28h-99V240.5h99m1-1h-101v87.28h101V239.5Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="327.39" y="190.41" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M544.06,240.5v85.28h-99V240.5h99m1-1h-101v87.28h101V239.5Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="226.4" y="190.41" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M443.07,240.5v85.28h-99V240.5h99m1-1h-101v87.28h101V239.5Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="630.36" y="277.68" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,327.78v85.28H748V327.78h99m1-1H747v87.28H848V326.78Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="277.68" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,327.78v85.28h-99V327.78h99m1-1h-101v87.28H747V326.78Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="428.38" y="277.68" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M645.05,327.78v85.28h-99V327.78h99m1-1h-101v87.28h101V326.78Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="327.39" y="277.68" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M544.06,327.78v85.28h-99V327.78h99m1-1h-101v87.28h101V326.78Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="226.4" y="277.68" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M443.07,327.78v85.28h-99V327.78h99m1-1h-101v87.28h101V326.78Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="630.36" y="364.96" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,415.05v85.28H748V415.05h99m1-1H747v87.28H848V414.05Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="364.96" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,415.05v85.28h-99V415.05h99m1-1h-101v87.28H747V414.05Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="428.38" y="364.96" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M645.05,415.05v85.28h-99V415.05h99m1-1h-101v87.28h101V414.05Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="327.39" y="364.96" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M544.06,415.05v85.28h-99V415.05h99m1-1h-101v87.28h101V414.05Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="226.4" y="364.96" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M443.07,415.05v85.28h-99V415.05h99m1-1h-101v87.28h101V414.05Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="630.36" y="452.23" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,502.33V587.6H748V502.33h99m1-1H747V588.6H848V501.33Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="452.23" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,502.33V587.6h-99V502.33h99m1-1h-101V588.6H747V501.33Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="428.38" y="452.23" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M645.05,502.33V587.6h-99V502.33h99m1-1h-101V588.6h101V501.33Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="327.39" y="452.23" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M544.06,502.33V587.6h-99V502.33h99m1-1h-101V588.6h101V501.33Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="226.4" y="452.23" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M443.07,502.33V587.6h-99V502.33h99m1-1h-101V588.6h101V501.33Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="630.36" y="539.51" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M847,589.6v85.28H748V589.6h99m1-1H747v87.28H848V588.6Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="529.37" y="539.51" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M746,589.6v85.28h-99V589.6h99m1-1h-101v87.28H747V588.6Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="428.38" y="539.51" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M645.05,589.6v85.28h-99V589.6h99m1-1h-101v87.28h101V588.6Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="327.39" y="539.51" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M544.06,589.6v85.28h-99V589.6h99m1-1h-101v87.28h101V588.6Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <rect x="226.4" y="539.51" width="99.99" height="86.28" fill="#fff"/>
                        <path d="M443.07,589.6v85.28h-99V589.6h99m1-1h-101v87.28h101V588.6Z"
                              transform="translate(-117.18 -49.59)" fill="#e2e2ec"/>
                        <path
                            d="M553.6,754.48c2.86-2.17,5.55-4.73,6.38-7.85a6.64,6.64,0,0,0-4.46-8c-4.09-1.28-8.46,1-11.78,3.37s-7.11,5-11.45,4.51c4.49-3.25,6.63-8.52,5.39-13.31a5.16,5.16,0,0,0-1.5-2.7c-2.27-2-6.39-1.13-9.11.43-8.65,5-11.06,14.55-11.11,23.18-.87-3.11-.14-6.35-.16-9.55s-1.09-6.73-4.39-8.45a15.71,15.71,0,0,0-6.7-1.29c-3.89-.12-8.22.2-10.87,2.52-3.3,2.88-2.44,7.72.43,10.89s7.24,5.16,11.25,7.35c3.06,1.67,6.16,3.62,8,6.26a5.68,5.68,0,0,1,.6,1.12h24.37A70.07,70.07,0,0,0,553.6,754.48Z"
                            transform="translate(-117.18 -49.59)" fill="var(--openmeet)"/>
                        <circle cx="239.59" cy="203.53" r="5.7" fill="#fc6681"/>
                        <circle cx="253.83" cy="203.53" r="5.7" fill="#ffd037"/>
                        <circle cx="440.87" cy="288.03" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="455.12" cy="288.03" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="745.64" cy="451.33" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="748.49" cy="444.69" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="751.34" cy="438.99" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="645" cy="203.53" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="659.24" cy="203.53" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="673.49" cy="203.53" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="687.73" cy="203.53" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="645" cy="380.12" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="659.24" cy="380.12" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="673.49" cy="380.12" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="687.73" cy="380.12" r="5.7" fill="var(--openmeet)"/>
                        <circle cx="340.23" cy="288.03" r="5.7" fill="#ffd037"/>
                        <circle cx="239.59" cy="374.43" r="5.7" fill="#fc6681"/>
                        <path
                            d="M857.9,515.22c6.25,3.69,16,6.09,28.35-1.84l-.12,17.56c.88,12,15.77,55.91,15.77,55.91l10.5,36.1a282.47,282.47,0,0,1,11.54,78.53c0,8.81.82,17.89,3.35,24.72,5.59,15.11-2.2,34.58-5.58,41.83a175.68,175.68,0,0,1-17.33,4.88,11.84,11.84,0,0,0-1.55.47l-.07-.1S887,779.53,880,778.67c-5.22-.64-8.49,5.87-4.4,10.66-3.86,1-7.82,1.71-10.49,1.38-7-.86-10.51,11.18,2.63,14.62s87.59,0,87.59,0a10.56,10.56,0,0,0,5.6-11.66c5.72-.22,9.29-.39,9.29-.39s13.14-6,0-22.37l-.7.53-2.81-8.27V752s16.64-80,11.39-89.46-7.88-57.63-7.88-57.63L972,552.44c4.75-9.8,7.18-25.16,8.41-37.17a78.87,78.87,0,0,0,3.36-17.63c.21-2.82.38-5.78.49-8.85A59.33,59.33,0,0,0,981,469c5-7.2,13.13-18.33,19.84-24.91,10.51-10.32,7.88-22.37,7.88-22.37l-4.38-29.25-10.51-49.89c1.32-13.84-1.57-21.81-4.76-26.31.76-4.47,1.47-8.94,2-13.43A171.87,171.87,0,0,0,988,244.36c-1.52-6.69-3.59-13.55-8.28-18.62-5.31-5.74-13.93-9.24-15.91-16.76-.49-1.87-.51-3.86-1.22-5.66-1.92-4.92-8-6.71-13.32-7.35-9.48-1.15-23.19-2-32.3,1.7-6.36,2.6-15.12,9.76-18.6,17.44-2,3.53-2.93,7.24-2.08,10.73a14.71,14.71,0,0,0,1.51,3.67A33,33,0,0,0,895.76,241a33.56,33.56,0,0,0,21.42,31.13c.21.66.4,1.31.56,1.95a33.42,33.42,0,0,1,.86,4.69c-.17,3-.36,6.09-.5,9.14q-.15.63-.32,1.24a225.38,225.38,0,0,0-22,11.22c5.26,7.74-.88,40.43-.88,40.43-13.14,7.74-26.28,27.53-12.26,48.17s6.13,43,6.13,43l-2.19,33.63h0v.06l-.44,6.73.17,0-.17,2.55.38.07,0,2.74c-6.15,2.26-15.14,6.82-20.5,15.25a53.81,53.81,0,0,1-9.17,11.25A6.76,6.76,0,0,0,857.9,515.22Zm105.76-89.36a32,32,0,0,1,3.11-16.92q3.09.06,6.19.07c.21,1.45.46,2.83.76,4.09C975.5,420.68,968.39,424.31,963.65,425.85Z"
                            transform="translate(-117.18 -49.59)" fill="url(#dee71953-6e04-4c93-a054-139b0acb5af5)"/>
                        <path
                            d="M965.39,759.25l3.37,10.11-11,11-36.24,8.43-26.13-2.53,1.69-9.27h0a11.18,11.18,0,0,1,8.3-8.17c10.74-2.52,31.22-8.28,35.52-16.27Z"
                            transform="translate(-117.18 -49.59)" fill="#db8b8b"/>
                        <path
                            d="M965.39,759.25l3.37,10.11-11,11-36.24,8.43-26.13-2.53,1.69-9.27h0a11.18,11.18,0,0,1,8.3-8.17c10.74-2.52,31.22-8.28,35.52-16.27Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M903.86,783.69l5.06-6.74-5.06-7.81s-15.17,6.12-21.91,5.28-10.11,11,2.53,14.33,84.28,0,84.28,0,12.64-5.9,0-21.91l-11,8.43s-18.54,10.11-27.81,8.43Z"
                            transform="translate(-117.18 -49.59)" fill="#2e3037"/>
                        <path
                            d="M881.1,798l26.13,2.53,36.24-8.43,11-11-.89-2.68-1.26-3.76L951.06,771l-24.44-6.74a15.14,15.14,0,0,1-5,5c-7.94,5.43-22.2,9.35-30.57,11.31a8.77,8.77,0,0,0-1,.31,11.14,11.14,0,0,0-7.26,7.86Z"
                            transform="translate(-117.18 -49.59)" fill="#db8b8b"/>
                        <path
                            d="M881.1,798l26.13,2.53,36.24-8.43,11-11-.89-2.68-10.06,7.74s-18.54,10.11-27.81,8.43H889.53l5.06-6.74-4.54-7a11.14,11.14,0,0,0-7.26,7.86Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M889.53,795.49l5.06-6.74-5.06-7.81s-15.17,6.12-21.91,5.28-10.11,11,2.53,14.33,84.28,0,84.28,0,12.64-5.9,0-21.91l-11,8.43s-18.54,10.11-27.81,8.43Z"
                            transform="translate(-117.18 -49.59)" fill="#2e3037"/>
                        <path
                            d="M910.6,306.66s40.46,4.21,34.56-12.64a30.34,30.34,0,0,1-1.25-14.88A41.25,41.25,0,0,1,951.06,262l-37.93,5.9a47.5,47.5,0,0,1,5.14,12.18C922.79,297.95,910.6,306.66,910.6,306.66Z"
                            transform="translate(-117.18 -49.59)" fill="#db8b8b"/>
                        <path
                            d="M979.71,498.82s-.84,36.24-9.27,53.94l-1.69,51.41s2.53,47.2,7.59,56.47-11,87.65-11,87.65v13.49s-27,10.11-34.56-1.69l7.59-100.3L935,520.73Z"
                            transform="translate(-117.18 -49.59)" fill="#474463"/>
                        <path
                            d="M979.71,498.82s-.84,36.24-9.27,53.94l-1.69,51.41s2.53,47.2,7.59,56.47-11,87.65-11,87.65v13.49s-27,10.11-34.56-1.69l7.59-100.3L935,520.73Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M996.57,382.51l5.06,13.49,4.21,28.66a25.35,25.35,0,0,1-7.59,21.91c-10.11,10.11-23.6,31.18-23.6,31.18l-16-48s16-2.53,13.49-13.49S970.44,385,970.44,385Z"
                            transform="translate(-117.18 -49.59)" fill="#fc6681"/>
                        <path
                            d="M996.57,382.51l5.06,13.49,4.21,28.66a25.35,25.35,0,0,1-7.59,21.91c-10.11,10.11-23.6,31.18-23.6,31.18l-16-48s16-2.53,13.49-13.49S970.44,385,970.44,385Z"
                            transform="translate(-117.18 -49.59)" opacity="0.05"/>
                        <path
                            d="M921.66,769.27c10.81,17,27.64,7.37,30.62,5.45L951.06,771l-24.44-6.74A15.14,15.14,0,0,1,921.66,769.27Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M887.85,531.69c.84,11.8,15.17,54.78,15.17,54.78l10.11,35.37a281.44,281.44,0,0,1,11.11,76.94c0,8.63.79,17.53,3.23,24.22,6.74,18.54-6.74,43.83-6.74,43.83,11.8,21.07,32,6.74,32,6.74V760.09s16-73.33,11.8-87.65-5.9-53.1-5.9-53.1v-70a79.38,79.38,0,0,0,23.13-50.32c.2-2.76.36-5.66.47-8.67.68-19-12.32-41.31-17.4-49.25-1.22-1.92-2-3-2-3l-74.42,29.52-.17.07,0,2.88,0,6.37Z"
                            transform="translate(-117.18 -49.59)" fill="#474463"/>
                        <path
                            d="M913.13,267.89a47.5,47.5,0,0,1,5.14,12.18,33,33,0,0,0,25.64-.94A41.25,41.25,0,0,1,951.06,262Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <circle cx="812.81" cy="198.06" r="32.87" fill="#db8b8b"/>
                        <path
                            d="M887.85,476.91l.36.07c35.34,7.27,79.71-29.57,79.71-29.57a43.68,43.68,0,0,1-3.07-6.27c-1.22-1.92-2-3-2-3l-74.42,29.52-.19,2.95Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M897.12,305.81s47.2-28.66,62.37-16.86l21.07,27s13.49,4.21,11,31.18L1001.63,396l-30.34,7.59s-17.7,16.86-3.37,41.3c0,0-44.67,37.08-80.07,29.5l2.53-39.61s7.59-21.91-5.9-42.14-.84-39.61,11.8-47.2C896.28,345.43,902.17,313.4,897.12,305.81Z"
                            transform="translate(-117.18 -49.59)" fill="#fc6681"/>
                        <path
                            d="M894.59,477.75s-17.7,3.37-26.13,16.86a52.53,52.53,0,0,1-8.82,11,6.69,6.69,0,0,0,1,10.66c6.69,4,17.6,6.49,31.38-4.83C915.66,492.08,894.59,477.75,894.59,477.75Z"
                            transform="translate(-117.18 -49.59)" fill="#db8b8b"/>
                        <path
                            d="M920.72,321.83s16.86-1.69,21.07,42.14,11,53.94,11,53.94,4.21,22.76-5.9,36.24-29.5,42.14-29.5,42.14-21.07,5.9-25.28-15.17l26.13-48.88s4.21-16.86-5.9-28.66S894.59,313.4,920.72,321.83Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M919,319.3s16.86-1.69,21.07,42.14,11,53.94,11,53.94,4.21,22.76-5.9,36.24-29.5,42.14-29.5,42.14-21.07,5.9-25.28-15.17l26.13-48.88s4.21-16.86-5.9-28.66S892.9,310.87,919,319.3Z"
                            transform="translate(-117.18 -49.59)" fill="#fc6681"/>
                        <path d="M905.12,350.9S903.44,377,911,391.36s7.59,32.87,0,43"
                              transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path d="M900.91,318.88s6.74-6.74,26.13-7.59,27.81-6.74,27.81-6.74"
                              transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M947.79,205.18c5.12.63,11,2.39,12.82,7.2.68,1.77.7,3.72,1.17,5.55,1.91,7.36,10.2,10.79,15.31,16.42,4.51,5,6.5,11.69,8,18.24a171.4,171.4,0,0,1,3,57.26c-1.64,14-5,27.74-5.94,41.78s.78,28.81,8.45,40.61c3.3,5.07,7.66,9.53,10,15.11-4.83,3.92-11.5,4.48-17.73,4.69q-10.87.37-21.75,0c-3.8-.13-7.77-.38-11.05-2.3a17.06,17.06,0,0,1-5.8-6.23c-4.15-7-5.19-15.5-5-23.66s1.47-16.28,1.62-24.45c.08-4.45-.27-9.18-2.83-12.82-1.85-2.63-4.66-4.4-7.06-6.53-9-8-12.12-20.82-12.42-32.87s1.69-24.12.67-36.13c-.4-4.7-2.16-10.35-6.78-11.26-1.46-.29-3,0-4.4-.56-3.71-1.43-3.35-6.66-4.41-10.49-1.19-4.3-4.86-7.62-5.89-12-2.43-10.2,10.55-22.37,19.06-25.92C925.48,203.2,938.67,204.06,947.79,205.18Z"
                            transform="translate(-117.18 -49.59)" opacity="0.1"/>
                        <path
                            d="M948.63,203.5c5.12.63,11,2.39,12.82,7.2.68,1.77.7,3.72,1.17,5.55,1.91,7.36,10.2,10.79,15.31,16.42,4.51,5,6.5,11.69,8,18.24a171.4,171.4,0,0,1,3,57.26c-1.64,14-5,27.74-5.94,41.78s.78,28.81,8.45,40.61c3.3,5.07,7.66,9.53,10,15.11-4.83,3.92-11.5,4.48-17.73,4.69q-10.87.37-21.75,0c-3.8-.13-7.77-.38-11.05-2.3a17.06,17.06,0,0,1-5.8-6.23c-4.15-7-5.19-15.5-5-23.66s1.47-16.28,1.62-24.45c.08-4.45-.27-9.18-2.83-12.82-1.85-2.63-4.66-4.4-7.06-6.53-9-8-12.12-20.82-12.42-32.87s1.69-24.12.67-36.13c-.4-4.7-2.16-10.35-6.78-11.26-1.46-.29-3,0-4.4-.56-3.71-1.43-3.35-6.66-4.41-10.49-1.19-4.3-4.86-7.62-5.89-12-2.43-10.2,10.55-22.37,19.06-25.92C926.32,201.51,939.51,202.37,948.63,203.5Z"
                            transform="translate(-117.18 -49.59)" fill="#472727"/>
                    </svg>
                    <hr class="mx-5 my-1">
                    <p class="text-center lead">Evenements du groupe</p>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row align-content-center">
                    @forelse($eventList as $e)
                        <div class="card shadow-sm p-5">
                            <div class="media">
                                @if($e['event']->picname != null)
                                    <img
                                        src="{{url('/storage/upload/image/'.$e['event']->picrepo.'/'.$e['event']->picname)}}"
                                        class="mr-3 hvr-grow" alt="Photo de {{$e['event']->name}}">
                                @endif
                                <div class="media-body">
                                    <div class="row my-1 justify-content-between">
                                        <h5 class="" style="font-size: 1rem!important;">{{$e['event']->name}}</h5>
                                        @if($e['event']->datefrom <= date('Y-m-d H:i:s') && $e['event']->dateto > date('Y-m-d H:i:s'))
                                            <span class="badge badge-primary glow-primary">En cours</span>
                                        @endif
                                    </div>

                                    <p>{!! str_replace('\\n','<br>',$e['event']->description) !!}</p>
                                    <small class="text-muted">
                                        aura lieu le
                                        <cite>{{strftime("%A %d %b %Y",strtotime($e['event']->datefrom))}}
                                            à {{strftime("%R",strtotime($e['event']->datefrom))}}</cite>
                                        @if($e['event']->dateto != null)


                                            jusqu'au <cite>{{strftime("%A %d %b %Y",strtotime($e['event']->dateto))}}
                                                à {{strftime("%R",strtotime($e['event']->dateto))}}</cite>

                                        @endif

                                    </small>
                                    <hr class="mx-4 my-1">
                                    <small>Participations : {{count($e['participations'])}}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="display-4 justify-content-center align-content-center">Aucun événement</p>
                    @endforelse
                </div>
            </div>


        </div>


    </div>
@endsection

