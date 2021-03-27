@component('layouts.app')
    <div class="min-h-screen pb-12">

        <section>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-gray-50">
                <div
                    class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-32 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        <span class="block">{{ __('messages.openmeet.brief') }}</span>
                        <span class="block text-primary-600" style="font-family: system-ui;">{{ __('messages.openmeet.tagline') }}</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href="#"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                {{__('messages.group.create')}}
                            </a>
                        </div>
                        <div class="ml-3 inline-flex rounded-md shadow">
                            <a href="#"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-primary-50">
                                {{__('messages.group.list')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" -mt-5">
                <div class="relative text-gray-600 w-2/3 lg:w-1/3 flex flex-col justify-center mx-auto">
                    <input type="search" name="serch" placeholder="{{ __('messages.search.long') }}"
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
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 pt-10 mx-auto">
                <div class="flex flex-col text-center w-full mb-10">
                    <h3 class="text-xs text-primary-500 tracking-widest font-medium title-font mb-1">
                        {{ __('messages.event.nearby.description') }}</h3>
                    <h2 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">
                        {{ __('messages.event.nearby') }}
                    </h2>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($nearby as $event)
                        <div class="p-4 w-full md:w-1/3">
                            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                                <div class="flex items-center mb-2">
                                    <div
                                        class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-primary-500 text-white flex-shrink-0">
                                        {{ $event->name[0] . $event->name[1] }}
                                    </div>
                                    <h2 class="text-gray-900 text-lg title-font font-medium">{{ $event->name }}</h2>
                                </div>
                                <div class="flex items-center mb-2 space-x-2">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: solid/location-marker -->
                                        <svg class="flex-shrink-0 mr-2 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{$event->location}}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-users mr-2 text-gray-400"></i>
                                        {{ count($event->users()) }} {{ __('messages.participants') }}
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 mb-3">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-calendar mr-2 text-gray-400"></i>
                                        {{$event->date_start}}
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <p class="leading-relaxed text-base">{{ Str::words($event->description, 10, ' ...') }}</p>
                                    <a href="{{ route('event.show', ['event' => $event]) }}"
                                        class="mt-3 text-primary-500 inline-flex items-center">Learn More
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
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
