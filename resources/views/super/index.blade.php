<x-app-layout>

    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full md:px-15 grid-cols-4">
        <div @click.away="open = false"
            class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 border-r border-gray-100"
            x-data="{ open: false }">
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                <a href="#"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">{{ __('messages.super.header') }}</a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}"
                class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">{{__('messages.overview')}}</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">Portfolio</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">About</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="#">Contact</a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Dropdown</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #1</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #2</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                href="#">Link #3</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-span-3 w-full md:px-8 lg:px-24 pt-5">

            <div class="min-h-full min-w-full">
                <div class="bg-white rounded-lg border border-gray-50 duration-500 px-2 sm:px-6 md:px-2 py-4 my-6">
                    <div class="grid grid-cols-12 gap-3">
                        <!-- Meta Column -->
                        <div class="col-span-0 sm:col-span-2 text-center hidden sm:block">
                            <!-- Vote Counts -->
                            <div class="grid grid-rows-2">
                                <div class="inline-block font-medium text-xl">
                                    {{$count_events}}
                                </div>

                                <div class="inline-block font-medium text-sm">
                                    {{ __('messages.events') }}
                                </div>
                            </div>

                            <!-- Answer Counts -->
                            <a href="#"
                                class="grid grid-rows-2 mx-auto mb-3 py-1 w-4/5 xl:w-3/5 rounded-md bg-green-400">
                                <div class="inline-block font-medium text-2xl text-white">
                                    {{$count_groups}}
                                </div>

                                <div class="inline-block font-medium text-white mx-1 mb-0 text-sm lg:text-md">{{ __('messages.groups') }}</div>
                            </a>

                            <!-- View Counts -->
                            <div class="grid my-3">
                                <span class="inline-block font-bold text-xs">
                                    {{$count_users}} {{ __('messages.users') }}
                                </span>
                            </div>
                        </div>

                        <!-- Summary Column -->
                        <div class="col-span-12 sm:col-start-3 sm:col-end-13 px-3 sm:px-0">
                            <div class="grid block sm:hidden">
                                <div class="flex flex-wrap">
                                    <div class="mr-2">
                                        <div class="inline-block font-light capitalize">
                                            <i class="uil uil-arrow-circle-up mr-1"></i>
                                            <span class="text-sm">
                                                {{$count_events}} {{ __('messages.events') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mr-2">
                                        <div class="inline-block font-light capitalize">
                                            <i class="uil uil-check-circle mr-1"></i>
                                            <span class="text-sm">
                                                {{$count_groups}} {{ __('messages.groups') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mr-2">
                                        <div class="inline-block">
                                            <i class="uil uil-eye mr-1"></i>
                                            <span class="text-sm capitalize font-light">
                                                {{$count_users}} {{ __('messages.users') }}
                                            </span>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="flex justify-between items-center hidden sm:block">
                                <span class="font-light text-gray-600">
                                    {{ __('messages.openmeet.brief') }}
                                </span>
                            </div>

                            <div class="mt-2">
                                <div class="sm:text-sm flex flex-row items-center md:text-md lg:text-lg text-gray-700 font-bold">
                                    <x-jet-application-mark class="h-8 w-auto mr-3" />
                                    {{ env('APP_NAME') }} - OpenMeet
                                </div>

                                <p class="mt-2 text-gray-600 text-sm md:text-md">
                                    {{ __('messages.openmeet.description') }}
                                </p>
                            </div>

                            <!-- Question Labels -->
                            <div class="grid grid-cols-2 mt-4 my-auto">
                                <!-- Categories  -->
                                <div class="col-span-12 lg:col-span-8">
                                    <div href="#" class="inline-block rounded-full text-white 
                                        bg-blue-400 hover:bg-blue-500 duration-300 
                                        text-xs 
                                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                                        opacity-90 hover:opacity-100">
                                        2.0.0-beta1
                                    </div>
                                    <div href="#" class="inline-block rounded-full text-white 
                                        bg-red-400 hover:bg-red-500 duration-300 
                                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                                        opacity-90 hover:opacity-100 text-xs">
                                        Local : {{ $hash }}
                                    </div>
                                    <div href="#" class="inline-block rounded-full text-white 
                                        bg-yellow-400 hover:bg-yellow-500 duration-300 
                                        text-xs 
                                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                                        opacity-90 hover:opacity-100">
                                        Remote : {{ $remoteHash }}
                                    </div>
                                    {{-- <div href="#" class="inline-block rounded-full text-white 
                                        bg-green-400 hover:bg-green-500 duration-300 
                                        text-xs 
                                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1 
                                        opacity-90 hover:opacity-100">
                                        Memcached
                                    </div> --}}
                                    
                                </div>

                                <!-- User -->
                                <div class="col-none hidden mr-2 lg:block lg:col-start-9 lg:col-end-12">
                                    <a href="https://floriaaan.github.io" class="flex items-center">
                                        <img src="https://floriaaan.github.io/images/logo.png" alt="avatar"
                                            class="mr-2 w-8 h-8 rounded-full">

                                        <div class="text-gray-600 font-bold text-sm hover:underline">
                                            Floriaaan
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="px-10 mb-5" />
                <div class="flex flex-col  w-full bg-gray-700 md:rounded-md p-3">
                    <h4 class="text-xl text-white font-semibold ml-5">
                        {{ $remoteHash == $hash ? __('messages.super.securitychecks.ok') : __('messages.super.securitychecks.notok') }}
                    </h4>
                    <div class="flex p-1 mt-2 flex-row md:space-x-4 sm:space-y-1 md:space-y-0 flex-wrap">
                        <div
                            class="border text-xs px-2 {{ $remoteHash == $hash ? 'border-green-400 bg-green-100 text-green-600' : 'border-red-500 bg-red-100 text-red-700' }}  rounded-full">
                            <?= $remoteHash == $hash ? '<i class="far fa-check-circle mr-2"></i>' . __('messages.super.update.ok') : '<i class="far fa-times-circle mr-2"></i>' . __('messages.super.update.notok') ?>
                        </div>
                        <div
                            class="border text-xs px-2 {{ $https ? 'border-green-400 bg-green-100 text-green-600' : 'border-red-500 bg-red-100 text-red-700' }}  rounded-full">
                            <?= $https ? '<i class="far fa-check-circle mr-2"></i>' . __('messages.super.https.ok') : '<i class="far fa-times-circle mr-2"></i>' . __('messages.super.https.notok') ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
