<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script>
        var spotlight_token = "{{ Auth::user() != null && Auth::user()->spotlight_token != null ? Auth::user()->spotlight_token : null }}"
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    @livewire('navigation-menu')
    <div id="react_root"></div>

    <main 
    {{-- class="pt-40 md:pt-20" --}}
    >
        {{ $slot }}
    </main>

    <footer class="bg-gray-50 text-gray-600 body-font px-10 w-full border-t-2 shadow-md bottom-0 border-gray-200">
        <div class="container px-5 pt-10 mx-auto hidden md:block lg:block xl:block">
            <div class="flex flex-wrap md:text-left text-center order-first">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        {{ __('messages.moreInfo') }}</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">{{ __('messages.devAPI') }}</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">{{ __('messages.legals') }}</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">{{ __('messages.bug') }}</a>
                        </li>
                    </nav>
                </div>
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        {{ __('messages.about') }}</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">{{ __('messages.repository') }}</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800">{{ __('messages.floriaaan') }}</a>
                        </li>
                    </nav>
                </div>

                <div class="lg:w-2/4 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        {{ __('messages.subscribe') }}</h2>
                    <div
                        class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-start">
                        <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                            <label for="footer-field"
                                class="leading-7 text-sm text-gray-600">{{ __('messages.footerField') }}</label>
                            <input type="text" id="footer-field" name="footer-field"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary-100 transition-colors duration-200 ease-in-out">
                        </div>
                        <button
                            class="lg:mt-2 xl:mt-0 flex-shrink-0 inline-flex text-white bg-primary-500 border-0 py-2 px-6 focus:outline-none hover:bg-primary-600 rounded focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition ease-in-out duration-150">{{ __('messages.submit') }}</button>
                    </div>
                    <p class="text-gray-500 text-sm mt-2 md:text-left text-center">
                        {{ __('messages.footerDescription') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <x-jet-application-mark class="block h-12 w-auto" />

                <span class="ml-3 text-xl">{{ env('APP_NAME') }}</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2021 Floriaaan —
                <a href="https://github.com/floriaaan"
                    class="text-gray-600 ml-1 hover:text-primary-600 transition duration-300" rel="noopener noreferrer"
                    target="_blank">@floriaaan</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start space-x-5">
                <a href="https://twitter.com/t3tra_"
                    class="text-gray-600 hover:text-primary-600 transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://github.com/floriaaan"
                    class="text-gray-600 hover:text-primary-600 transition duration-300">
                    <i class="fab fa-github"></i>
                </a>
            </span>
        </div>
    </footer>

    @stack('modals')

    @livewireScripts
</body>

</html>
