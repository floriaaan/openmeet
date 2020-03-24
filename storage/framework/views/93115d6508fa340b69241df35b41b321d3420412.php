<?php $__env->startSection('title'); ?>
    Administration
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container position-relative" style="height: 100%">
        <div class="row">
            <div class="col-lg-3 d-none-custom">


                <div class="list-group position-fixed w-list-admin" style="margin-top: 20px">
                    <h5 class="list-title">Paramètres du site</h5>
                    <a class="list-group-item list-group-item-action" href="#settings">
                        Paramètres du site

                    </a>
                    <a class="list-group-item list-group-item-action" href="#theming">
                        Thèmes

                    </a>
                    <a class="list-group-item list-group-item-action" href="#privacy">
                        Confidentialité

                    </a>
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 200px">
                    <h5 class="list-title">Paramètres relatifs aux utilisateurs</h5>
                    <a class="list-group-item list-group-item-action" href="#users">
                        Utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($userCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#reports">
                        Signalements d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($reportCount); ?></span>
                    </a>
                <!--
                    <a class="list-group-item list-group-item-action" href="#bans">
                        Banissements d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($banCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#blocks">
                        Blocages d'utilisateurs
                        <span class="badge badge-primary badge-pill"><?php echo e($blockCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#messages">
                        Messages
                        <span class="badge badge-primary badge-pill"><?php echo e($messageCount['foruser']); ?></span>
                    </a>-->
                </div>

                <div class="list-group position-fixed w-list-admin" style="margin-top: 355px">
                    <h5 class="list-title">Paramètres relatifs aux groupes/événements</h5>
                    <a class="list-group-item list-group-item-action" href="#groups">
                        Groupes
                        <span class="badge badge-primary badge-pill"><?php echo e($groupCount); ?></span>
                    </a>
                    <a class="list-group-item list-group-item-action" href="#events">
                        Evénements
                        <span class="badge badge-primary badge-pill"><?php echo e($eventCount); ?></span>
                    </a>
                <!--<a class="list-group-item list-group-item-action" href="#gmessages">
                        Messages de groupes
                        <span class="badge badge-primary badge-pill"><?php echo e($messageCount['forgroup']); ?></span>
                    </a>-->
                </div>
            </div>

            <div class="col-lg-9">
                <div>
                    <div class="row justify-content-between">
                        <h4 id="settings" class="my-5">Paramètres de <?php echo e(Setting('openmeet.name')); ?></h4>
                        <svg id="cb7db7bb-371f-430c-ab8e-9f8547f8cfe6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="1130" height="868.1" viewBox="0 0 1130 868.1">
                            <defs>
                                <linearGradient id="be60935f-ac8f-4117-88a8-c3e19524f342" x1="340.5" y1="874.69" x2="340.5" y2="452.37"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="gray" stop-opacity="0.25"/>
                                    <stop offset="0.54" stop-color="gray" stop-opacity="0.12"/>
                                    <stop offset="1" stop-color="gray" stop-opacity="0.1"/>
                                </linearGradient>
                            </defs>
                            <title>dashboard</title>
                            <path
                                d="M1143.14,213.61a231.21,231.21,0,0,0-44.83-60.38l-621.86-5.18,512-60.79A337.39,337.39,0,0,0,884.57,69.84C835.28,36.19,771.93,16,702.83,16c-62,0-119.33,16.29-166.07,43.93-39.72-17.3-85-27.11-133.11-27.11-138.17,0-253.3,80.9-279.13,188.19Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)" opacity="0.1"/>
                            <path
                                d="M1165,303.59a197,197,0,0,0-19.38-84.92L67.86,314.31a209.54,209.54,0,0,0-25.25,53.91l333.75,42.06L35,440.94C45.27,562.4,168.43,658.3,318.88,658.3c75.73,0,144.54-24.3,195.53-63.93,51.15,40.38,120.62,65.21,197.17,65.21,113.57,0,211.6-54.67,257.25-133.71,91.58-24.58,162.72-86.28,187.07-163.47L733.83,307.06H1165C1165,305.9,1165,304.75,1165,303.59Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)" opacity="0.1"/>
                            <ellipse cx="499.98" cy="855.15" rx="289.98" ry="12.94" fill="var(--openmeet)" opacity="0.1"/>
                            <path d="M707.09,848.34v7.82H475.84v-6.35a76,76,0,0,0,5.23-140.37H705.52a76,76,0,0,0,1.57,138.9Z"
                                  transform="translate(-35 -15.95)" fill="#c8cad7"/>
                            <path d="M705.52,709.44a76.11,76.11,0,0,0-42,50.39H523.08a76.13,76.13,0,0,0-42-50.39Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M211,669.6v43.9c0,24.24,17.74,43.89,39.63,43.89H931.05c21.89,0,39.63-19.65,39.63-43.89V669.6Z"
                                  transform="translate(-35 -15.95)" fill="#c8cad7"/>
                            <path d="M707.09,848.34v7.82H475.84v-6.35a76,76,0,0,0,17.83-9.5H692.91A76.39,76.39,0,0,0,707.09,848.34Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <rect x="364.42" y="826.8" width="384.09" height="23.17" rx="9.5" ry="9.5" fill="#c8cad7"/>
                            <path d="M970.68,188.57A39.62,39.62,0,0,0,931.05,149H250.66A39.62,39.62,0,0,0,211,188.57V678.14H970.68Z"
                                  transform="translate(-35 -15.95)" fill="#474157"/>
                            <path
                                d="M950,206.25V626.92a19.5,19.5,0,0,1-19.51,19.51H251.27a19.5,19.5,0,0,1-19.51-19.51V206.25a19.51,19.51,0,0,1,19.51-19.51H930.44A19.51,19.51,0,0,1,950,206.25Z"
                                transform="translate(-35 -15.95)" fill="#4c4c78"/>
                            <circle cx="555.85" cy="151.89" r="9.15" fill="#fff"/>
                            <circle cx="555.85" cy="699.38" r="22.56" fill="#fff"/>
                            <path d="M383.53,196.5V646.43H251.27a19.5,19.5,0,0,1-19.51-19.51V206.25l.71-2.65,1.9-7.1Z"
                                  transform="translate(-35 -15.95)" fill="#fff"/>
                            <polygon points="365.5 187.65 365.5 228.15 196.76 228.15 196.76 190.3 197.47 187.65 365.5 187.65" fill="#4c4c78"/>
                            <path d="M950,206.25H231.76a19.5,19.5,0,0,1,19.51-19.5H930.44A19.5,19.5,0,0,1,950,206.25Z"
                                  transform="translate(-35 -15.95)" fill="#c8cad7"/>
                            <circle cx="216.27" cy="180.55" r="4.88" fill="#ededf4"/>
                            <circle cx="230.9" cy="180.55" r="4.88" fill="#ededf4"/>
                            <circle cx="245.53" cy="180.55" r="4.88" fill="#ededf4"/>
                            <rect x="221.98" y="205.48" width="101.33" height="9.33" fill="var(--openmeet)"/>
                            <rect x="221.98" y="250.98" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="283.15" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="315.32" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="347.48" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="379.65" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="411.82" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="221.98" y="443.98" width="101.33" height="9.33" fill="var(--openmeet)" opacity="0.5"/>
                            <rect x="431.49" y="239.79" width="449.01" height="1.5" fill="#dce0ed" opacity="0.5"/>
                            <rect x="431.49" y="274.62" width="449.01" height="1.5" fill="#dce0ed" opacity="0.5"/>
                            <rect x="431.49" y="309.46" width="449.01" height="1.5" fill="#dce0ed" opacity="0.5"/>
                            <rect x="431.49" y="344.29" width="449.01" height="1.5" fill="#dce0ed" opacity="0.5"/>
                            <rect x="431.49" y="379.12" width="449.01" height="1.5" fill="#dce0ed" opacity="0.5"/>
                            <polygon
                                points="880.51 380.61 430.94 380.61 430.94 312.11 472.17 332.43 514.84 338.21 552.28 326.92 597.45 291.89 620.17 278.77 636.78 275.57 652.67 276.42 678.81 289.33 714.33 311.96 742.21 315.55 764.32 307.93 811.17 269.55 835.09 261.02 860.12 264.89 880.51 276.66 880.51 380.61"
                                fill="var(--openmeet)" opacity="0.5"/>
                            <path
                                d="M544.3,354.18c-40.48,0-77.9-24.76-78.36-25.08l1.11-1.66c.58.39,58.16,38.49,107.09,19.4C592,339.89,604.68,329.06,617,318.6c12.83-10.93,24.95-21.26,41.46-25.74,19-5.13,39.65-.48,55.38,12.44,13.44,11.05,40.22,28.8,68.51,23.49,14.42-2.7,26.58-13.24,39.45-24.39C846.44,283,872,260.91,916.09,292.63l-1.17,1.62c-42.85-30.79-67.76-9.21-91.84,11.66-13.08,11.34-25.44,22-40.39,24.85-29.1,5.45-56.44-12.64-70.15-23.91-15.23-12.52-35.26-17-53.58-12.05-16.09,4.36-28,14.54-40.69,25.32-12.41,10.57-25.25,21.51-43.4,28.59A83.88,83.88,0,0,1,544.3,354.18Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <circle cx="647.55" cy="275.37" r="11.13" fill="var(--openmeet)"/>
                            <path
                                d="M403.62,533.19c-15.21-8.76-21-10.93-21-10.94l-.31-.22a12.66,12.66,0,0,1-3.84-4.85c0-.35,0-.7,0-1v.1c.25-4.64,3.54-8.85,6.67-12.53q4-4.71,8-9.41A9.19,9.19,0,0,0,395.2,491a7.49,7.49,0,0,0,.22-2c0-.28,0-.55,0-.82,0-2.34-.11-4.68-.19-7-.08-2.05-.6-4.62-2.65-5-1.06-.22-2.46.16-3-.75a1.68,1.68,0,0,1-.14-1.21s0,.06,0,.09a.52.52,0,0,1,0-.11,27.65,27.65,0,0,0,.76-4.81,6.9,6.9,0,0,0-.33-2.43c-1.19-3.39-5.26-4.78-8.86-5.42s-7.64-1.19-9.9-4a32.74,32.74,0,0,0-2-2.71,7.88,7.88,0,0,0-3.69-1.82,20.72,20.72,0,0,0-13.38,1.17c-1.74.78-3.49,1.82-5.4,1.71s-3.68-1.5-5.64-1.83c-3.16-.54-6.19,1.79-7.75,4.54a11,11,0,0,0-1.43,5.35c0,.1,0,.21,0,.31h0a7.86,7.86,0,0,0,2.06,5.46c1.36,1.42,3.39,2.39,4,4.25.23.76.18,1.58.38,2.34,0,.1.06.19.09.29l-.11.13a23.77,23.77,0,0,0-5,14.62,24.26,24.26,0,0,0,17,23c0,.23,0,.47,0,.72a10.34,10.34,0,0,1-3.3,8.05l-21.58,8.66s-13-1.54-17.68,17.45a32.16,32.16,0,0,0-.8,9.63c.17,2.87-.23,7.91-3.56,14.43-5.33,10.44-4.12,34.39,6.78,36.76,10.29,2.24,14.32,1.31,14.74,1.2l0,.42c-.17,4.5-1.8,43.26-7.73,48-1.65,1.29-1.34,2.17,0,2.76,0,0,0,.25,0,.7-.18,2.84-1.1,13.63-5.07,19.78C307.48,690,308,731,308,731l-3.14,24.19s1.93,14.94,0,17.55c-1.73,2.33-4,57.61-4.52,69.59h-.2a5.83,5.83,0,0,0-4.66,2.84C292.9,849.31,284,856.94,284,856.94c-1.93,2.75-9.09,5.38-12.87,6.62a8.25,8.25,0,0,0-1.46.63,7.68,7.68,0,0,0-3.25,3.42,3.66,3.66,0,0,0-.34,2.85c1,2.37,21.07,4,26.15,1.66,4-1.86,19.84-4.32,26.42-5.28a5.42,5.42,0,0,0,4.7-4.7,3.1,3.1,0,0,0-.6-2.35h0c-1.26-1.56-1.91-5.82-2.2-8.6a5.85,5.85,0,0,0,1.48-.88,63.09,63.09,0,0,1,3.63-25.38c4.84-12.8,6.3-36.52,5.09-51.94,0,0,14.77-63.57,26.4-69.5h0c.18.22,5.82,7.46,6.54,29.88.72,22.77,8.95,37.71,8.95,37.71s-3.63,38.66,0,53.13L367.87,847a7.39,7.39,0,0,1-.57-.52s.14.64.34,1.65l-.1.48.2.05c.54,2.85,1.34,7.82,1,10.74-.19,1.67-.65,3.94-1,6.18-.5,3.51-.64,6.92,1.21,7.66,3,1.22,20.83,2.89,23.86-1a5.61,5.61,0,0,0,.88-5.86,6,6,0,0,0-.88-1.49s-4.73-7.73-3.39-13.18a4,4,0,0,0-.57-3.12A161.08,161.08,0,0,1,393,823c3-11.41,9.42-36.43,4.72-52.89h0c-.18-.64-.38-1.28-.6-1.9a71,71,0,0,1-2.67-27.75,56.41,56.41,0,0,1,0-24.19C397.33,703,399.36,690,399.36,690s1.6-17.55.2-28.31l-.09-.69.76-.17s-4.11-18.26-5.57-29.88c-.34-2.75-.79-6.22-1.28-9.93a26.22,26.22,0,0,0,3.95-1c13.08-4.51,17.19-45.31,17.19-45.31V561.77S418.88,542,403.62,533.19Zm-97.43,315-.64-.34h0Z"
                                transform="translate(-35 -15.95)" fill="url(#be60935f-ac8f-4117-88a8-c3e19524f342)"/>
                            <path
                                d="M395.73,768.6c5.67,16.31-1,42.78-4,54.6a165.7,165.7,0,0,0-4,26,55,55,0,0,1-20.8-.48l5-24.34c-3.54-14.42,0-52.95,0-52.95s-8-14.9-8.74-37.59c-.7-22.33-6.2-29.55-6.38-29.78h0C345.38,710,331,773.33,331,773.33c1.18,15.36-.24,39-5,51.77a64.05,64.05,0,0,0-3.55,25.29c-1.65,1.39-3.95,1.63-6.43,1.23-6.75-1.09-14.84-6.91-14.84-6.91s2.6-69,4.49-71.62,0-17.49,0-17.49l3.07-24.11s-.47-40.89,4-48c3.88-6.13,4.77-16.89,4.95-19.71,0-.45,0-.7,0-.7l6.84-8.19s66.19-5,71.15,0c1.22,1.22,2,4,2.42,7.48,1.36,10.72-.2,28.21-.2,28.21s-2,13-4.82,26.23a57.4,57.4,0,0,0,0,24.11A72,72,0,0,0,395.73,768.6Z"
                                transform="translate(-35 -15.95)" fill="#65617d"/>
                            <path
                                d="M391.59,872.25c-2.95,3.9-20.32,2.25-23.28,1-1.81-.75-1.67-4.14-1.18-7.64.31-2.23.76-4.5.94-6.15.48-4.26-1.41-12.89-1.41-12.89s3.9,4.14,4.84,0a4.5,4.5,0,0,1,3.37-3.2,8.84,8.84,0,0,1,6.14.38c3.07,1.33,8.19,4.17,7.27,8-1.3,5.43,3.31,13.13,3.31,13.13a5.93,5.93,0,0,1,.86,1.49A5.67,5.67,0,0,1,391.59,872.25Z"
                                transform="translate(-35 -15.95)" fill="#a27772"/>
                            <path
                                d="M391.59,872.25c-2.95,3.9-20.32,2.25-23.28,1-1.81-.75-1.67-4.14-1.18-7.64,1.86.87,5,1.6,10.32,1.11a28.9,28.9,0,0,1,3.72-.12,85.06,85.06,0,0,0,11.28-.22A5.67,5.67,0,0,1,391.59,872.25Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M331,773.33c1.18,15.36-.24,39-5,51.77a64.05,64.05,0,0,0-3.55,25.29c-1.65,1.39-3.95,1.63-6.43,1.23,1.43-10,7.5-52.93,11.4-86.86,4.43-38.65,25.17-65.24,25.17-65.24l4.14,4.55C345.38,710,331,773.33,331,773.33Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M384.5,524.9l-2.89,14.18-14.13,23.76-17.43-7.45s-23.7-24.82-8.81-28.36a13.13,13.13,0,0,0,4.95-2.2c2.92-2.21,3.84-5.41,3.86-8.55a26.29,26.29,0,0,0-2.42-10.17l30.49-9.57a48.52,48.52,0,0,0-2.19,12.35c-.23,8.3,2.85,12.4,5.38,14.35A9.06,9.06,0,0,0,384.5,524.9Z"
                                transform="translate(-35 -15.95)" fill="#fbbebe"/>
                            <path d="M378.12,496.54a48.52,48.52,0,0,0-2.19,12.35,24.1,24.1,0,0,1-25.88,7.39,26.29,26.29,0,0,0-2.42-10.17Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M381.61,492.64a24.11,24.11,0,1,1-24.11-24.11A24.05,24.05,0,0,1,381.61,492.64Z"
                                  transform="translate(-35 -15.95)" fill="#fbbebe"/>
                            <path
                                d="M384.5,524.9l-2.89,14.18-14.13,23.76-17.43-7.45s-23.7-24.82-8.81-28.36a13.13,13.13,0,0,0,4.95-2.2c-2.69,7.39,8.41,22.76,8.41,22.76,1.29,1.9,4.26.71,4.26.71,7.14-1.08,20.31-21.64,22.45-25.06A9.06,9.06,0,0,0,384.5,524.9Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M398.15,662.39c-4.2,1-27.42,6.09-36.22,4.81-9.69-1.42-28.54-2.36-28.54-2.36s-12,.64-15.68-1c0-.45,0-.7,0-.7l6.84-8.19s66.19-5,71.15,0C397,656.13,397.7,658.9,398.15,662.39Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M354.6,548.3s-12.47-17.27-7.77-24l-21.07,8.64s-12.68-1.54-17.25,17.38a33,33,0,0,0-.79,9.61c.17,2.85-.22,7.87-3.47,14.37-5.2,10.4-4,34.28,6.62,36.64s14.42,1.18,14.42,1.18-1.42,43.26-7.56,48.22,15.67,3.78,15.67,3.78,18.84,1,28.53,2.37,36.87-5,36.87-5-4-18.2-5.44-29.78-4.72-36.24-4.72-36.24l24.11-32.66s4.25-19.74-10.64-28.48-20.5-10.9-20.5-10.9-15,24.37-22.76,25.55C358.85,549,355.89,550.2,354.6,548.3Z"
                                transform="translate(-35 -15.95)" fill="#ff748e"/>
                            <path
                                d="M326.94,555.16s-.23,7.8,1.19,10.87,6.61,20.09,6.61,20.09H322.93s6.38-6.85,5.91-10.16S326.94,555.16,326.94,555.16Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M361.93,614s-26.1-6.38-28.53-11.81-9.14-17.61-9.14-17.61l2.75-3.71,12.7,10s15.13,12,22.22,13.24S361.93,614,361.93,614Z"
                                transform="translate(-35 -15.95)" fill="#fbbebe"/>
                            <path
                                d="M361.93,614s-26.1-6.38-28.53-11.81-9.14-17.61-9.14-17.61l2.75-3.71,12.7,10s15.13,12,22.22,13.24S361.93,614,361.93,614Z"
                                transform="translate(-35 -15.95)" opacity="0.05"/>
                            <path
                                d="M384.5,583.29v14.16h-2.28a66.24,66.24,0,0,0-32.14,8.32l-4.26,2.36-1.15.64-7.33-16.5,6.86-6.15.35,0c1.68.16,8.93.76,12-.27s6.55-4.14,15.14-1.94c4.24,1.08,7.85,5.83,12,4.35Z"
                                transform="translate(-35 -15.95)" fill="#fbbebe"/>
                            <path
                                d="M407.31,557.52l4.73,5.32v12.88s-4,40.66-16.78,45.15-35.55-2.6-35.55-2.6-5.89-15.6-3.14-16.55,24.34-6.64,24.34-6.64-.31-23.85,4.42-30.94c0,0-3.07-22.22,7.56-22.69S407.31,557.52,407.31,557.52Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M408,557.52l4.73,5.32v12.88s-4,40.66-16.79,45.15-35.54-2.6-35.54-2.6-5.89-15.6-3.14-16.55,24.33-6.64,24.33-6.64-.3-23.85,4.43-30.94c0,0-3.08-22.22,7.56-22.69S408,557.52,408,557.52Z"
                                transform="translate(-35 -15.95)" fill="#ff748e"/>
                            <path
                                d="M375,502.88a9.31,9.31,0,0,0-.54-4.6,3.53,3.53,0,0,0-3.74-2.16c-2,.47-2.9,3.1-4.88,3.73-1.67.53-3.5-.65-4.3-2.21a11.3,11.3,0,0,1-.82-5.14c0-2,0-3.95,0-5.93,0-2.15-.07-4.47-1.4-6.16-1.65-2.1-5.52-3-8.1-2.93a6.87,6.87,0,0,0-4.63,1.86,6,6,0,0,1-4.87,1.74,4.21,4.21,0,0,1-3.39-2.94.24.24,0,0,1,0-.08,24.11,24.11,0,1,1,35.86,32A66.79,66.79,0,0,0,375,502.88Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path
                                d="M341.71,480.37a4.24,4.24,0,0,1-3.4-2.94c-.19-.76-.14-1.58-.37-2.33-.55-1.86-2.53-2.83-3.86-4.24-2.66-2.82-2.49-7.47-.61-10.87,1.53-2.74,4.48-5.05,7.57-4.52,1.91.34,3.56,1.7,5.5,1.82s3.57-.92,5.27-1.7a19.84,19.84,0,0,1,13.06-1.16,7.56,7.56,0,0,1,3.6,1.81,30.59,30.59,0,0,1,1.92,2.7c2.2,2.81,6.15,3.36,9.66,4s7.49,2,8.64,5.41c.77,2.24,0,4.67-.41,7a2,2,0,0,0,.09,1.45c.55.91,1.92.53,3,.74,2,.42,2.5,3,2.57,5q.14,3.48.19,7a9,9,0,0,1-.2,2.59,9.17,9.17,0,0,1-2,3.25l-7.81,9.38c-3.46,4.16-7.13,9-6.44,14.37-1.64.73-3.58-.68-4.12-2.4s-.11-3.56.26-5.32a65.36,65.36,0,0,0,1.23-9.23,9.34,9.34,0,0,0-.54-4.61,3.54,3.54,0,0,0-3.75-2.16c-2,.47-2.89,3.1-4.87,3.73-1.67.54-3.5-.65-4.3-2.21a11.43,11.43,0,0,1-.82-5.14v-5.93c0-2.15-.07-4.47-1.4-6.16-1.64-2.1-5.52-3-8.1-2.93a6.87,6.87,0,0,0-4.63,1.86A6,6,0,0,1,341.71,480.37Z"
                                transform="translate(-35 -15.95)" fill="#7c5c5c"/>
                            <path d="M347.15,554.57l7.41,30.4S360.39,584.94,347.15,554.57Z" transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M372.45,549.48s-9.7,15.88-5.91,32.29l1.8.13S365.12,574.3,372.45,549.48Z" transform="translate(-35 -15.95)"
                                  opacity="0.1"/>
                            <path d="M378.59,639.31s11.9-3.94,12.77,5.2C391.36,644.51,389.11,638.24,378.59,639.31Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M344.2,586.83s-2.36,16.55,1.89,23.17a51.94,51.94,0,0,1-20.8,2.83l-1.42-26Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M345.82,608.13l-1.15.64-7.33-16.5,6.86-6.15h.35v0C344.44,586.92,342.53,601.13,345.82,608.13Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M344.2,586.12s-2.36,16.55,1.89,23.17a51.94,51.94,0,0,1-20.8,2.83l-8.27-26Z"
                                  transform="translate(-35 -15.95)" fill="#ff748e"/>
                            <path
                                d="M323.75,862.19a5.34,5.34,0,0,1-4.59,4.68c-6.41,1-21.88,3.4-25.78,5.26-5,2.37-24.58.71-25.53-1.65a3.75,3.75,0,0,1,.34-2.85,7.79,7.79,0,0,1,4.59-4c3.7-1.24,10.68-3.85,12.56-6.59,0,0,8.7-7.62,11.18-11.73a5.66,5.66,0,0,1,4.55-2.83c2.07-.1,4.37.95,5.32,5.48,0,0,11.34,6.47,14.41.8,0,0,.47,8.71,2.35,11.1h0A3.13,3.13,0,0,1,323.75,862.19Z"
                                transform="translate(-35 -15.95)" fill="#a27772"/>
                            <path
                                d="M323.75,862.19a5.34,5.34,0,0,1-4.59,4.68c-6.41,1-21.88,3.4-25.78,5.26-5,2.37-24.58.71-25.53-1.65a3.75,3.75,0,0,1,.34-2.85,7.57,7.57,0,0,1,3.17-3.4c3.2,2.12,10.3,4.2,25.92,1.76,14.9-2.33,22.27-4.61,25.87-6.16h0A3.13,3.13,0,0,1,323.75,862.19Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <g opacity="0.1">
                                <path
                                    d="M388.25,475.67a.5.5,0,0,0,0-.12,21.55,21.55,0,0,0,.73-5.36,33.89,33.89,0,0,1-.73,4.3A2.62,2.62,0,0,0,388.25,475.67Z"
                                    transform="translate(-35 -15.95)"/>
                                <path
                                    d="M374.46,497.79a7,7,0,0,1,.58,2.7,8.11,8.11,0,0,0-.58-3.76,3.55,3.55,0,0,0-3.75-2.17c-2,.47-2.89,3.11-4.87,3.74-1.67.53-3.5-.66-4.3-2.22a11.17,11.17,0,0,1-.82-5.14c0-2,0-3.95,0-5.92,0-2.15-.07-4.47-1.4-6.16-1.65-2.11-5.52-3-8.11-2.94a6.83,6.83,0,0,0-4.62,1.87,6,6,0,0,1-4.87,1.73,4.19,4.19,0,0,1-3.4-2.94c-.2-.76-.14-1.57-.37-2.33-.55-1.86-2.53-2.82-3.86-4.23a7.78,7.78,0,0,1-2-5,8.09,8.09,0,0,0,2,6.06c1.33,1.41,3.31,2.38,3.86,4.24.23.75.17,1.57.37,2.33a4.23,4.23,0,0,0,3.4,2.94,6,6,0,0,0,4.87-1.74A6.93,6.93,0,0,1,351.2,477c2.59-.08,6.46.84,8.11,2.94,1.33,1.69,1.39,4,1.4,6.16,0,2,0,3.95,0,5.92a11.19,11.19,0,0,0,.82,5.15c.8,1.56,2.63,2.74,4.3,2.21,2-.63,2.85-3.26,4.87-3.74A3.57,3.57,0,0,1,374.46,497.79Z"
                                    transform="translate(-35 -15.95)"/>
                                <path
                                    d="M393.89,491.28a9.3,9.3,0,0,1-2,3.26q-3.92,4.68-7.81,9.37c-3.28,3.95-6.76,8.52-6.51,13.56.24-4.62,3.46-8.82,6.51-12.49l7.81-9.38a9.26,9.26,0,0,0,2-3.25,9,9,0,0,0,.2-2.6A6.48,6.48,0,0,1,393.89,491.28Z"
                                    transform="translate(-35 -15.95)"/>
                                <path
                                    d="M373.51,515.89a5.58,5.58,0,0,1-.24-1.27,6.33,6.33,0,0,0,.24,2.33c.53,1.72,2.48,3.13,4.12,2.4,0-.35-.07-.7-.08-1C375.93,519,374,517.57,373.51,515.89Z"
                                    transform="translate(-35 -15.95)"/>
                            </g>
                            <path d="M295,847.42s2.47,4.34,11.43.51" transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M370.65,848.46s7.73,9.09,17.46,3" transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M393.13,740.94s-5.46,3.41-5.64,5.36,2.82-1.42,2.82-1.42Z" transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M395.28,767.08a11.33,11.33,0,0,1-6.72,2.62c-4.08.18-3.74,5.5-1.07,3.9S395.28,767.08,395.28,767.08Z"
                                  transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M396.32,770.49s-2.62,12.86-4.75,10.38" transform="translate(-35 -15.95)" opacity="0.1"/>
                            <g opacity="0.5">
                                <rect x="471.17" y="458.65" width="66" height="14" fill="#dce0ed"/>
                                <rect x="622.72" y="458.65" width="66" height="14" fill="#dce0ed"/>
                                <rect x="774.27" y="458.65" width="66" height="14" fill="#dce0ed"/>
                            </g>
                            <ellipse cx="952.73" cy="801.29" rx="26.93" ry="4.55" fill="var(--openmeet)" opacity="0.1"/>
                            <ellipse cx="115.22" cy="858.74" rx="26.93" ry="4.55" fill="var(--openmeet)" opacity="0.1"/>
                            <ellipse cx="893.79" cy="850.05" rx="40.21" ry="6.8" fill="var(--openmeet)"/>
                            <path
                                d="M945.41,854.89a11.64,11.64,0,0,0,3.83-5.79c.5-2.3-.48-5.05-2.67-5.89-2.46-.94-5.09.76-7.09,2.49s-4.27,3.68-6.88,3.32a10.5,10.5,0,0,0,3.24-9.81,4.08,4.08,0,0,0-.9-2c-1.37-1.46-3.84-.84-5.48.31-5.2,3.66-6.65,10.72-6.68,17.08-.52-2.29-.08-4.68-.09-7s-.66-5-2.64-6.23a8,8,0,0,0-4-.94c-2.34-.09-4.95.14-6.54,1.85-2,2.13-1.47,5.69.25,8s4.36,3.8,6.77,5.42a15.13,15.13,0,0,1,4.84,4.61,4.81,4.81,0,0,1,.35.83h14.66A41.11,41.11,0,0,0,945.41,854.89Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <path d="M151.45,807.19s5.5,7.19-2.53,18-14.65,20-12,26.77c0,0,12.12-20.15,22-20.43S162.3,819.31,151.45,807.19Z"
                                  transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <path
                                d="M151.45,807.19a9,9,0,0,1,1.13,2.26c9.62,11.3,14.74,21.85,5.49,22.11-8.61.25-18.94,15.65-21.42,19.54a9.24,9.24,0,0,0,.29.89s12.12-20.15,22-20.43S162.3,819.31,151.45,807.19Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M161.66,816.35c0,2.53-.28,4.58-.63,4.58s-.63-2-.63-4.58.35-1.34.7-1.34S161.66,813.82,161.66,816.35Z"
                                  transform="translate(-35 -15.95)" fill="#ffd037"/>
                            <path
                                d="M165.17,819.37c-2.22,1.21-4.16,1.94-4.32,1.63s1.49-1.54,3.71-2.75,1.35-.33,1.51,0S167.39,818.16,165.17,819.37Z"
                                transform="translate(-35 -15.95)" fill="#ffd037"/>
                            <path d="M122.44,807.19s-5.5,7.19,2.53,18,14.65,20,12,26.77c0,0-12.11-20.15-22-20.43S111.59,819.31,122.44,807.19Z"
                                  transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <path
                                d="M122.44,807.19a9,9,0,0,0-1.13,2.26c-9.62,11.3-14.74,21.85-5.49,22.11,8.61.25,18.94,15.65,21.42,19.54a7.16,7.16,0,0,1-.3.89s-12.11-20.15-22-20.43S111.59,819.31,122.44,807.19Z"
                                transform="translate(-35 -15.95)" opacity="0.1"/>
                            <path d="M112.22,816.35c0,2.53.29,4.58.64,4.58s.63-2,.63-4.58-.35-1.34-.7-1.34S112.22,813.82,112.22,816.35Z"
                                  transform="translate(-35 -15.95)" fill="#ffd037"/>
                            <path
                                d="M108.72,819.37c2.22,1.21,4.15,1.94,4.32,1.63s-1.49-1.54-3.71-2.75-1.35-.33-1.52,0S106.5,818.16,108.72,819.37Z"
                                transform="translate(-35 -15.95)" fill="#ffd037"/>
                            <path
                                d="M114,851.05s15.36-.48,20-3.77,23.63-7.24,24.78-1.95,23.08,26.29,5.74,26.43-40.29-2.7-44.91-5.51S114,851.05,114,851.05Z"
                                transform="translate(-35 -15.95)" fill="#a8a8a8"/>
                            <path
                                d="M164.79,869.92c-17.34.14-40.3-2.7-44.92-5.51-3.51-2.15-4.92-9.84-5.38-13.38l-.52,0s1,12.38,5.6,15.2,27.57,5.65,44.91,5.51c5,0,6.73-1.82,6.64-4.46C170.42,868.9,168.51,869.89,164.79,869.92Z"
                                transform="translate(-35 -15.95)" opacity="0.2"/>
                            <path
                                d="M501.5,572.37c0-20.44,16.63-36.14,37.08-36.14h.29v-9.3h-.29c-25.58,0-46.38,19.87-46.38,45.44a46.26,46.26,0,0,0,15.89,34.9l6.59-6.59A37,37,0,0,1,501.5,572.37Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <path d="M539.8,526.94v9.3a37.07,37.07,0,1,1-24.19,65.37L509,608.2a46.36,46.36,0,1,0,30.78-81.26Z"
                                  transform="translate(-35 -15.95)" fill="var(--openmeet)" opacity="0.5"/>
                            <path
                                d="M843.8,535.76c20.44,0,36.14,16.63,36.14,37.08,0,.09,0,.19,0,.29h9.3c0-.1,0-.2,0-.29,0-25.57-19.87-46.38-45.44-46.38a46.24,46.24,0,0,0-34.9,15.89l6.59,6.59A37,37,0,0,1,843.8,535.76Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)" opacity="0.5"/>
                            <path d="M889.23,574.06h-9.3a37.07,37.07,0,1,1-65.37-24.19L808,543.28a46.36,46.36,0,1,0,81.26,30.78Z"
                                  transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                            <path
                                d="M709,529.66l-1.85,9.26c13.61,5.49,22.31,18.83,22.31,34.38a37.07,37.07,0,1,1-51.93-33.95L673.41,531A46.36,46.36,0,1,0,738.8,573.3C738.8,553.23,726.92,536.11,709,529.66Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)" opacity="0.5"/>
                            <path
                                d="M693.59,535.69a32.38,32.38,0,0,1,12.91,2.68l1.85-9.25a40.9,40.9,0,0,0-14.76-2.73,46.17,46.17,0,0,0-19,4.09l4.16,8.33A36.69,36.69,0,0,1,693.59,535.69Z"
                                transform="translate(-35 -15.95)" fill="var(--openmeet)"/>
                        </svg>

                    </div>

                    <div>
                        <?php echo Form::open(['url' => '/admin/edit/settings']); ?>

                        <div class="form-group">
                            <?php echo Form::label('uName', 'Nom du site', ['class' =>'control-label']); ?>

                            <?php echo Form::text('uName', $value = Setting('openmeet.name'), ['class' => 'form-control', 'placeholder' => 'Nom du site']); ?>

                            <?php echo $errors->first('uName', '<small class="text-danger">Le champ Nom du site est incorrect.</small>'); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('uColor', 'Couleur primaire', ['class' =>'control-label']); ?>

                            <?php echo Form::color('uColor', $value=Setting('openmeet.color'), ['class' => 'form-control']); ?>

                        </div>

                        <div class="form-group">
                            <?php echo Form::label('uSlogan', 'Slogan du site', ['class' =>'control-label']); ?>

                            <?php echo Form::text('uSlogan', $value = Setting('openmeet.slogan'), ['class' => 'form-control', 'placeholder' => 'Slogan']); ?>

                            <?php echo $errors->first('uSlogan', '<small class="text-danger">Le champ Slogan est incorrect.</small>'); ?>

                        </div>
                        <?php echo Form::submit('Valider les modifications', ['class' => 'btn btn-primary mt-4 pull-right'] ); ?>


                        <?php echo Form::close(); ?>

                    </div>


                    <h4 id="theming" class="my-5">Thèmes</h4>
                    <form method="POST" action="<?php echo e(url('/admin/edit/theme')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-between">
                            <div>
                                <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                                    <label class="btn btn-light <?php if(Setting('openmeet.theme') == "day"): ?>active <?php endif; ?>">
                                        <input type="radio" name="theme" value="day" autocomplete="off"
                                               <?php if(Setting('openmeet.theme') == "day"): ?>checked <?php endif; ?>>
                                        <i class="fas fa-sun"></i> Jour
                                    </label>
                                    <label class="btn btn-dark <?php if(Setting('openmeet.theme') == "night"): ?>active <?php endif; ?>">
                                        <input type="radio" name="theme" value="night" autocomplete="off"
                                               <?php if(Setting('openmeet.theme') == "night"): ?>checked <?php endif; ?>>
                                        <i class="fas fa-moon"></i> Nuit
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Valider les modifications</button>
                        </div>


                    </form>
                    <div class="row justify-content-end mt-2">
                        <a href="<?php echo e(url('/admin/edit/views')); ?>" class="btn btn-secondary mt-2">Modifier les pages</a>

                    </div>


                    <h4 id="privacy" class="my-5">Confidentialité</h4>
                    <form action="/admin/edit/privacy" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="robots" id="robots"
                                       <?php if(Setting('openmeet.robots')): ?> checked <?php endif; ?>>
                                <label class="custom-control-label" for="robots">
                                    Visible sur Google (fichier robots.txt)
                                </label>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="apidoc" id="apidoc"
                                       <?php if(Setting('openmeet.apidoc')): ?> checked <?php endif; ?>>
                                <label class="custom-control-label" for="apidoc">
                                    Activer l'APIDoc (<code>URL : '/doc'</code>)
                                    <small class="text-muted font-weight-bolder">Attention toutes les routes seront
                                        affichées !</small>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-1">
                            <button type="submit" class="btn btn-primary">
                                Valider les modifications
                            </button>
                        </div>

                    </form>


                </div>

                <hr class="my-5">

                <div>
                    <h4 id="users" class="my-5">Utilisateurs (5 derniers utilisateurs)</h4>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($userList)): ?>
                                <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->lname); ?></td>
                                        <td><?php echo e($user->fname); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/roles/'.$user->id)); ?>">
                                                <?php if($user->isadmin): ?>
                                                    <span class="badge badge-pill badge-success">
                                                        <i class="fas fa-user-check"></i>
                                                        <small class="">Changer</small>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-danger">
                                                        <i class="fas fa-user-times"></i>
                                                        <small class="">Changer</small>
                                                    </span>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success" href="/user/show/<?php echo e($user->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-warning" href="/user/report/<?php echo e($user->id); ?>">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </a>
                                                <a class="btn btn-danger" href="/admin/users/delete/<?php echo e($user->id); ?>">
                                                    <i class="fas fa-skull-crossbones"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/users/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>

                    <h4 id="reports" class="my-5">Signalements des utilisateurs (10 derniers signalements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Envoyé par</th>
                                <th scope="col">Créé le</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($reportList)): ?>

                                <?php $__currentLoopData = $reportList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($report['report']->id); ?></td>
                                        <td><?php echo e($report['concerned']->fname); ?> <?php echo e($report['concerned']->lname); ?></td>
                                        <td><?php echo e($report['sender']->fname); ?> <?php echo e($report['sender']->lname); ?></td>
                                        <td><?php echo e($report['report']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/reports/show/<?php echo e($report['report']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/reports/delete/<?php echo e($report['report']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/reports')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="bans" class="my-5">Bannissement des utilisateurs (10 derniers Bannissements)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Du groupe</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($banList)): ?>

                                <?php $__currentLoopData = $banList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($ban['ban']->id); ?></td>
                                        <td><?php echo e($ban['banned']->fname); ?> <?php echo e($ban['banned']->lname); ?></td>
                                        <td><?php echo e($ban['banisher']->name); ?></td>
                                        <td><?php echo e($ban['ban']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/bans/show/<?php echo e($ban['ban']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/bans/delete/<?php echo e($ban['ban']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/bans/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>
                    <h4 id="blocks" class="my-5">Blocages des utilisateurs (10 derniers Blocages)</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Concerné</th>
                                <th scope="col">Par</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($blockList)): ?>

                                <?php $__currentLoopData = $blockList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td>#<?php echo e($block['block']->id); ?></td>
                                        <td><?php echo e($block['target']->fname); ?> <?php echo e($block['target']->lname); ?></td>
                                        <td><?php echo e($block['blocker']->fname); ?> <?php echo e($block['blocker']->lname); ?></td>
                                        <td><?php echo e($block['block']->date); ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                   href="/admin/blocks/show/<?php echo e($block['block']->id); ?>">
                                                    <i class="far fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger"
                                                   href="/admin/blocks/delete/<?php echo e($block['block']->id); ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="<?php echo e(url('/admin/blocks/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                    </div>


                    <div>
                        <h4 id="groups" class="my-5">Groupes (10 derniers groupes)</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Créé le</th>

                                    <th scope="col">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($groupList)): ?>

                                    <?php $__currentLoopData = $groupList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>#<?php echo e($group['group']->id); ?></td>
                                            <td><?php echo e($group['group']->name); ?></td>
                                            <td><?php echo e($group['admin']->fname); ?> <?php echo e($group['admin']->lname); ?></td>
                                            <td><?php echo e($group['group']->datecreate); ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-success"
                                                       href="/groups/show/<?php echo e($group['group']->id); ?>">
                                                        <i class="far fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-danger"
                                                       href="/groups/delete/<?php echo e($group['group']->id); ?>">
                                                        <i class="fas fa-skull-crossbones"></i>
                                                    </a>
                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </tbody>
                            </table>

                            <a href="<?php echo e(url('/admin/groups/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                        </div>

                        <h4 id="events" class="my-5">Evénements (10 derniers événements)</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Organisateur</th>
                                    <th scope="col">Date de début</th>
                                    <th scope="col">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($eventList)): ?>

                                    <?php $__currentLoopData = $eventList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>#<?php echo e($event['event']->id); ?></td>
                                            <td><?php echo e($event['event']->name); ?></td>
                                            <td><?php echo e($event['group']->name); ?></td>
                                            <td><?php echo e($event['event']->datefrom); ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-success"
                                                       href="/events/show/<?php echo e($event['event']->id); ?>">
                                                        <i class="far fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-danger"
                                                       href="/events/delete/<?php echo e($event['event']->id); ?>">
                                                        <i class="fas fa-skull-crossbones"></i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </tbody>
                            </table>

                            <a href="<?php echo e(url('/admin/events/')); ?>" class="btn btn-primary float-right">Voir plus</a>
                        </div>


                        <hr class="my-4">
                        <h4 id="search" class="my-5">Recherche super-utilisateur</h4>
                        <div>
                            <form action="/admin/search" method="POST" class="form-inline justify-content-between">
                                <?php echo csrf_field(); ?>


                                <input type="text" required name="search" class="form-control w-50 mx-1"
                                       placeholder="Rechercher">

                                <button type="submit" class="btn btn-secondary mx-1">Rechercher</button>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .row {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        #cb7db7bb-371f-430c-ab8e-9f8547f8cfe6 {
            width: 100px;
            height: 100px;
        }

    </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\langl\Desktop\Cours\Projets\ProjetClient\OpenMeet\resources\views/admin/panel.blade.php ENDPATH**/ ?>