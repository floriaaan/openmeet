<x-app-layout>
    <section style="min-height: 70vh" class="lg:flex flex-col sm:pt-24 md:pt-10 py-8 space-y-4 px-4  md:px-24">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-green-400 sm:text-3xl sm:truncate">
                    {{ $group->name }}
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6 ">

                    <div
                        class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                        <!-- Heroicon name: solid/location-marker -->
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                        Remote
                    </div>
                    <div
                        class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                        <i class="fas fa-users mr-2 "></i>
                        {{ count($group->users()) }} {{ __('messages.members') }}
                    </div>
                    <div
                        class="mt-2 flex items-center text-sm text-gray-500 hover:text-gray-700 duration-200 transition">
                        <!-- Heroicon name: solid/calendar -->
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.created') }}
                        {{ utf8_encode(strftime('%a %d %b', strtotime($group->created_at))) }}
                    </div>
                </div>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                @if ($group->admin()->id == auth()->id())
                    <span class="block">
                        <a href="{{ route('group.edit', ['group' => $group]) }}"
                            class="inline-flex transition duration-300 items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-green-500">
                            <!-- Heroicon name: solid/pencil -->
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            {{ __('messages.edit') }}
                        </a>
                    </span>
                @endif

                <span class="block ml-3">
                    <button type="button"
                        class="inline-flex transition duration-300 items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-green-500">
                        <!-- Heroicon name: solid/link -->
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.share') }}
                    </button>
                </span>

                <span class="ml-3">
                    <a
                        class="cursor-pointer transition duration-300 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-green-500">
                        <!-- Heroicon name: solid/check -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('messages.group.subscribed') }}
                    </a>
                </span>

                {{-- <!-- Dropdown -->
            <span class="ml-3 relative sm:hidden">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    id="mobile-menu" aria-haspopup="true">
                    More
                    <!-- Heroicon name: solid/chevron-down -->
                    <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!--
              Dropdown panel, show/hide based on dropdown state.
      
              Entering: "transition ease-out duration-200"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                    aria-labelledby="mobile-menu" role="menu">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">View</a>
                </div>
            </span> --}}
            </div>


        </div>
        <div class="border-b border-gray-300 pb-5">
            <p class="font-light text-gray-500">
                {{ $group->description }}
            </p>
        </div>
        <div class="md:grid grid-cols-3 gap-4 space-y-2 md:space-y-0">
            @forelse ($group->events() as $event)
                @if (strlen($event->description) > 100)
                    <div class="p-5 rounded border-purple-300 bg-purple-100 col-span-2">
                    @else
                        <div class="p-5 rounded border-purple-300 bg-purple-100">
                @endif
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl font-bold leading-7 text-purple-400 sm:text-3xl sm:truncate">
                            {{ $event->name }}
                        </h2>
                        <div class="mt-1 flex flex-col lg:flex-row lg:flex-wrap lg:mt-0 lg:space-x-6 ">

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
                    <div class="mt-5 flex lg:mt-0 lg:ml-4">
                        <span class="block">
                            <a href="{{ route('event.show', ['event', $event]) }}"
                                class="inline-flex transition duration-300 items-center justify-center w-8 h-8 border border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                <i class="far fa-eye"></i>
                            </a>
                        </span>
                        @if ($group->admin()->id == auth()->id())
                            <span class="block ml-3">
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

                        <span class="block ml-3">
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

                        <span class="ml-3">
                            <a
                                class="cursor-pointer transition duration-300 inline-flex items-center justify-center w-8 h-8 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                <!-- Heroicon name: solid/check -->
                                <svg class="h-4 w-4 -mt-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </span>

                    </div>


                </div>
            </div>
        @empty

        @endforelse
        </div>
    </section>

</x-app-layout>
