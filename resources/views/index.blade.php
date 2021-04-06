@component('layouts.app')
    <div class="min-h-screen pb-12">

        <section>
            <div class="bg-gray-50">
                <div
                    class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-32 xl:py-48 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        <span class="block">{{ __('messages.openmeet.brief') }}</span>
                        <span class="block text-primary-600"
                            style="font-family: system-ui;">{{ __('messages.openmeet.tagline') }}</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href="#"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                {{ __('messages.group.create') }}
                            </a>
                        </div>
                        <div class="ml-3 inline-flex rounded-md shadow">
                            <a href="#"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-primary-50">
                                {{ __('messages.group.list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" -mt-5">
                <form action="{{ route('search.post') }}" method="POST" class="w-full">
                    @csrf
                    <div class="relative text-gray-600 w-2/3 lg:w-1/3 flex flex-col justify-center mx-auto">
                        <input type="search" name="query" placeholder="{{ __('messages.search.long') }}"
                            class="bg-white appearance-none border-2 border-gray-100 w-full py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary-100 transition-colors duration-200 ease-in-out h-10 px-5 pr-10 rounded-full text-sm">
                        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4 hover:border-transparent">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 pt-10 mx-auto">
                <div class="flex flex-col text-center w-full mb-10">
                    <h3 class="text-xs text-purple-500 tracking-widest font-medium title-font mb-1">
                        {{ __('messages.event.nearby.description') }}</h3>
                    <h2 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">
                        {{ __('messages.event.nearby') }}
                    </h2>
                </div>
                <div class="md:grid grid-cols-3 gap-4 space-y-2 md:space-y-0 -m-4">
                    @forelse ($nearby as $event)
                        <div class="p-5 rounded  border-purple-300 bg-purple-100">
                            <div class="lg:flex flex-row w-full">
                                <div class="flex flex-col flex-grow ">
                                    <h2 class="text-2xl font-bold leading-7 pb-2 border-b border-purple-200 text-purple-700 sm:text-3xl sm:truncate">
                                        {{ $event->name }}
                                    </h2>
                                    <div class="flex flex-row">
                                        <div class="mt-1 flex flex-col  lg:flex-wrap">

                                            <div
                                                class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                                                <!-- Heroicon name: solid/location-marker -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 " xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $event->location }}
                                            </div>
                                            <div
                                                class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                                                <i class="fas fa-users mr-2 "></i>
                                                {{ count($event->users()) }} {{ __('messages.participants') }}
                                            </div>
                                            <div
                                                class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                                                <!-- Heroicon name: solid/calendar -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ __('messages.event.start') }}
                                                {{ utf8_encode(strftime('%a %d %b', strtotime($event->date_start))) }}
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="mt-5 flex flex-shrink flex-row lg:flex-col space-x-1 pt-4 lg:pt-0 lg:space-x-0 lg:space-y-1 lg:ml-4 lg:pl-4 border-t lg:border-t-0 lg:border-l border-purple-300">
                                    <span class="block">
                                        <a href="{{ route('event.show', ['event' => $event]) }}"
                                            class="inline-flex transition duration-300 items-center justify-center w-8 h-8 border border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </span>
                                    @if ($event->group()->admin()->id == auth()->id())
                                        <span class="block">
                                            <a href="{{ route('event.edit', ['event' => $event]) }}"
                                                class="inline-flex transition duration-300 items-center justify-center w-8 h-8 border border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                                <!-- Heroicon name: solid/pencil -->
                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                        </span>
                                    @endif

                                    <span class="block">
                                        <button type="button"
                                            class="inline-flex transition duration-300 items-center justify-center w-8 h-8 border border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                            <!-- Heroicon name: solid/link -->
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>

                                    <span class="">
                                        <form method="POST" action="{{ route('event.participate') }}">
                                            @csrf
                                            <input hidden name="event" value="{{ $event->id }}" />
                                            @if ($event->is_auth_participating() != false)
                                                <button type="submit"
                                                    class="cursor-pointer transition duration-300 inline-flex items-center justify-center w-8 h-8 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                                    <!-- Heroicon name: solid/check -->
                                                    <svg class="h-4 w-4 -mt-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button type="submit"
                                                    class="cursor-pointer transition duration-300 inline-flex items-center justify-center w-8 h-8 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                                    <!-- Heroicon name: solid/check -->
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 3a1 1 0 011-1h.01a1 1 0 010 2H7a1 1 0 01-1-1zm2 3a1 1 0 00-2 0v1a2 2 0 00-2 2v1a2 2 0 00-2 2v.683a3.7 3.7 0 011.055.485 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0A3.7 3.7 0 0118 12.683V12a2 2 0 00-2-2V9a2 2 0 00-2-2V6a1 1 0 10-2 0v1h-1V6a1 1 0 10-2 0v1H8V6zm10 8.868a3.704 3.704 0 01-4.055-.036 1.704 1.704 0 00-1.89 0 3.704 3.704 0 01-4.11 0 1.704 1.704 0 00-1.89 0A3.704 3.704 0 012 14.868V17a1 1 0 001 1h14a1 1 0 001-1v-2.132zM9 3a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm3 0a1 1 0 011-1h.01a1 1 0 110 2H13a1 1 0 01-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </form>
                                    </span>

                                </div>

                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </section>

        {{-- <div class="grid gap4">
            <div class="md:w-2/3">
                <div class="flex h-full min-w-full bg-red-900"></div>
            </div>
            <div class="hidden lg:block md:w-1/3 p-10">

                <x-calendar />
            </div>

        </div> --}}

    </div>
@endcomponent
