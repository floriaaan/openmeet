<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 md:py-16 mx-auto flex flex-col">
            <div class="lg:w-5/6 mx-auto">
                <div class="rounded-lg h-72 overflow-hidden">
                    <img alt="content" class="object-cover object-center h-full w-full"
                        src="https://dummyimage.com/1200x500">
                </div>
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3 mx-5 sm:px-5 rounded bg-green-50 text-center sm:py-8">
                        <a href="{{ route('group.show', ['group' => $event->group()]) }}">
                            <div
                                class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-green-200 text-green-400">
                                <i class="fas fa-users text-3xl"></i>
                            </div>
                            <div class="flex flex-col items-center text-center justify-center">
                                <h2 class="font-medium title-font mt-4 text-green-600 text-lg">
                                    {{ $event->group()->name }}
                                </h2>
                                <div class="w-12 h-1 bg-green-500 rounded mt-2 mb-4"></div>
                                <p class="text-xs">{{ $event->group()->description }}</p>
                            </div>
                        </a>
                    </div>
                    <div
                        class="sm:w-2/3 sm:py-8 sm:border-l sm:pl-5 border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <p class="leading-relaxed text-sm mb-4">{{ $event->description }}</p>
                        <p class="inline-flex items-center">
                            <span class="border-r border-gray-300 pr-3">
                                {{ __('messages.event.start') }} <span
                                    class="text-purple-500 font-bold">{{ $event->date_start }}</span>
                                @if ($event->date_end != null)
                                    {{ __('messages.event.end') }} {{ $event->date_end }}

                                @endif
                            </span>
                            <span class="pl-3">
                                <span class="text-purple-500 font-bold">{{ count($event->users()) }}</span>
                                {{ __('messages.participants') }}
                            </span>
                        </p>
                        <div class="mt-5 flex">

                            @if ($event->group()->admin_id == auth()->id())
                                <span class="block mr-3">
                                    <a href="{{ route('event.edit', ['event' => $event]) }}"
                                        class="inline-flex transition duration-300 items-center justify-center border px-3 py-2 border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                        <!-- Heroicon name: solid/pencil -->
                                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        {{ __('messages.edit') }}
                                    </a>
                                </span>
                            @endif

                            <span class="">
                                <button type="button"
                                    class="inline-flex transition duration-300 items-center justify-center border px-3 py-2 border-purple-100 rounded-md text-sm font-medium text-white bg-purple-400 hover:bg-purple-600 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                    <!-- Heroicon name: solid/link -->
                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ __('messages.share') }}
                                </button>
                            </span>

                            <span class="ml-3">
                                <form method="POST" action="{{ route('event.participate') }}">
                                    @csrf
                                    <input hidden name="event" value="{{ $event->id }}" />
                                    @if ($event->is_auth_participating() != false)
                                        <button type="submit"
                                            class="cursor-pointer transition duration-300 inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ __('messages.participating') }}
                                        </button>

                                    @else
                                        <button type="submit"
                                            class="cursor-pointer transition duration-300 inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-offset-2 focus:ring-purple-500">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 3a1 1 0 011-1h.01a1 1 0 010 2H7a1 1 0 01-1-1zm2 3a1 1 0 00-2 0v1a2 2 0 00-2 2v1a2 2 0 00-2 2v.683a3.7 3.7 0 011.055.485 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0A3.7 3.7 0 0118 12.683V12a2 2 0 00-2-2V9a2 2 0 00-2-2V6a1 1 0 10-2 0v1h-1V6a1 1 0 10-2 0v1H8V6zm10 8.868a3.704 3.704 0 01-4.055-.036 1.704 1.704 0 00-1.89 0 3.704 3.704 0 01-4.11 0 1.704 1.704 0 00-1.89 0A3.704 3.704 0 012 14.868V17a1 1 0 001 1h14a1 1 0 001-1v-2.132zM9 3a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm3 0a1 1 0 011-1h.01a1 1 0 110 2H13a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ __('messages.participating.not') }}
                                        </button>
                                    @endif
                                </form>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
