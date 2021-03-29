<nav x-data="{ open: false }"
    class="text-gray-600 body-font w-full  z-50 top-0 shadow sticky bg-white md:bg-opacity-90 transition duration-300 ease-in-out blur">

    <header class="text-gray-600 body-font md:block">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <div class="hidden md:flex lg:w-2/5 pl-5 flex-wrap space-x-10 items-center text-base md:ml-auto">
                <div class="relative text-gray-600 w-2/3 flex flex-row items-center">
                    <input type="search" name="serch" placeholder="{{ __('messages.search') }}"
                        class="bg-gray-50 appearance-none border-2 border-gray-50 w-full py-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-primary-100 transition-colors duration-200 ease-in-out h-10 px-5 pr-28 rounded-full text-sm">
                    <div class="absolute right-0 mr-4 hover:border-transparent flex flex-row items-center space-x-5">
                        <span style="opacity: 1;"
                            class="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-100 rounded-md bg-white"><span
                                class="sr-only">Press </span><kbd class="font-sans"><abbr class="no-underline">Ctrl
                                </abbr></kbd><span class="sr-only"> and </span><kbd class="font-sans">K</kbd><span
                                class="sr-only"> to search</span></span>
                        <button type="submit">
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
            </div>


            <a href="/"
                class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                <x-jet-application-mark class="block h-9 w-auto" />

                <span class="ml-3 text-xl font-bold">{{ env('APP_NAME') }}</span>
            </a>


            <div class="lg:w-2/5 inline-flex items-center lg:justify-end ml-5 pr-5 space-x-5 lg:space-x-8 lg:ml-0">
                @auth
                    <x-jet-dropdown align="right" width="w-72">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                <span
                                    class="h-8 w-8 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-yellow-400 bg-yellow-200 hover:bg-yellow-300 transition duration-150 ease-in-out"
                                    style="background-color: #fcf0cf;">
                                    <i class="fas fa-bell text-yellow-400"></i>
                                    @if ($nav_notifications_hasUnread)
                                        <span style="margin-top: -28px; margin-right:-28px"
                                            class="absolute flex justify-center items-center">
                                            <span class="rounded-full animate-ping bg-red-400 opacity-75 h-3 w-3"></span>
                                            <span class="rounded-full absolute bg-red-600 h-2 w-2"></span>
                                        </span>


                                    @endif
                                </span>
                                {{-- <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('messages.message') }}
                            </div>
                            @forelse ($nav_messages as $message)
                                <a href={{ route('message.show', ['user_id' => $message->sender_id == auth()->id() ? $message->receiver_id : $message->sender_id]) }}
                                    class='flex flex-row px-4 py-2 text-sm leading-5 text-gray-700 hover:text-yellow-400 hover:bg-yellow-50 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>
                                    <span
                                        class="w-16 h-16 flex items-center justify-center rounded text-yellow-500 bg-yellow-200 p-5"><i
                                            class="fas fa-users text-2xl"></i></span>
                                    <div class="flex flex-col ml-2">
                                        <span class="text-yellow-700 font-bold">{{ $message->content }}</span>
                                        <span class="text-gray-400 text-xs">
                                            @if ($message->sender_id == auth()->id())
                                                {{ __('messages.message.to') }}
                                                {{ \App\Models\User::find($message->receiver_id)->name }}
                                            @else
                                                {{ __('messages.message.from') }}
                                                {{ \App\Models\User::find($message->sender_id)->name }}
                                            @endif
                                        </span>
                                    </div>

                                </a>
                            @empty
                                <div class="h-24 w-full flex justify-center items-center px-6">
                                    {{ __('messages.message.empty') }}
                                </div>


                            @endforelse

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('messages.notification') }}
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                @else

                @endauth

                <x-jet-dropdown align="right" width="w-96">
                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span
                                class="h-8 w-8 bg-green-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none  focus:ring-1 focus:ring-offset-1 focus:ring-green-400  transition duration-150 ease-in-out">

                                <i class="fas fa-users text-green-500"></i>
                            </span>
                            {{-- <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg> --}}

                        </button>

                    </x-slot>
                    <x-slot name="content">

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('messages.group') }}
                        </div>

                        @if (count($nav_groups) > 0)
                            <div class="space-y-2">
                                @foreach ($nav_groups as $group)
                                    <a href={{ route('group.show', ['group' => $group]) }}
                                        class='flex flex-row px-4 py-2 text-sm leading-5 text-gray-700 hover:text-green-400 hover:bg-green-50 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>
                                        <span
                                            class="w-16 h-16 flex items-center justify-center rounded text-green-500 bg-green-200 p-5"><i
                                                class="fas fa-users text-2xl"></i></span>
                                        <div class="flex flex-col ml-2">
                                            <span class="text-green-700 font-bold">{{ $group->name }}</span>
                                            <span class="text-gray-400 text-xs">{{ $group->description }}</span>
                                        </div>

                                    </a>
                                @endforeach
                            </div>
                            <div class="border-t border-gray-100"></div>

                        @endif




                        <x-jet-dropdown-link href="{{ route('group.create') }}"
                            class="hover:text-green-400 hover:bg-green-50">
                            <i class="fas fa-plus mr-2"></i>
                            {{ __('messages.group.create') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('group.index') }}"
                            class="hover:text-green-400 hover:bg-green-50">
                            <i class="fas fa-users mr-2"></i>
                            {{ __('messages.group.all') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('group.index') }}"
                            class="hover:text-green-400 hover:bg-green-50">
                            <i class="fas fa-cog mr-2"></i>
                            {{ __('messages.group.manage') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                <x-jet-dropdown align="right" width="w-96">
                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span
                                class="h-8 w-8 bg-purple-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none  focus:ring-1 focus:ring-offset-1 focus:ring-green-400  transition duration-150 ease-in-out">

                                <i class="fas fa-calendar-alt text-purple-500"></i>
                            </span>
                            {{-- <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg> --}}

                        </button>

                    </x-slot>
                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('messages.event') }}
                        </div>

                        @if (count($nav_events) > 0)
                            <div class="space-y-2">
                                @foreach ($nav_events as $event)
                                    <a href={{ route('event.show', ['event' => $event]) }}
                                        class='flex flex-row px-4 py-2 text-sm leading-5 text-gray-700 hover:text-purple-400 hover:bg-purple-50 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>
                                        <span
                                            class="w-16 h-16 flex items-center justify-center rounded text-purple-500 bg-purple-200 p-5"><i
                                                class="fas fa-calendar-alt text-2xl"></i></span>
                                        <div class="flex flex-col ml-2">
                                            <span class="text-purple-700 font-bold">{{ $event->name }}</span>
                                            <span class="text-gray-400 text-xs">{{ __('messages.event.startAt') }}
                                                {{ $event->date_start }}</span>
                                        </div>

                                    </a>
                                @endforeach
                            </div>
                            <div class="border-t border-gray-100"></div>

                        @endif


                        <x-jet-dropdown-link href="{{ route('event.create') }}"
                            class="hover:text-purple-400 hover:bg-purple-50">
                            <i class="fas fa-plus mr-2"></i>
                            {{ __('messages.event.create') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('event.index') }}"
                            class="hover:text-purple-400 hover:bg-purple-50">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            {{ __('messages.event.all') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>



                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @auth
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="rounded-md">
                                    <button style="margin-top: 5px" type="button"
                                        class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                        <img class="h-8 w-8 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&amp;color=EF4444&amp;background=FECACA"
                                            alt="{{ Auth::user()->name }}" />

                                        {{-- <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg> --}}
                                    </button>
                                </span>
                            @endif
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                    <span
                                        class="h-8 w-8 bg-red-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <i class="fas fa-user text-red-500"></i>
                                    </span>

                                </button>
                            </span>
                        @endauth

                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}"
                                class="hover:text-red-500 hover:bg-red-50">
                                <i class="fas fa-user mr-2"></i>
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                            this.closest('form').submit();"
                                    class="hover:text-red-500 hover:bg-red-50">
                                    <i class="fas fa-lock mr-2"></i>

                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>

                            {{-- <div class="border-t border-gray-100"></div> --}}
                            <!-- Super Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('messages.super.header') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('admin.index') }}"
                                class="hover:text-red-500 hover:bg-red-50">
                                <i class="fas fa-cog mr-2"></i>
                                {{ __('messages.super.index') }}
                            </x-jet-dropdown-link>

                        @else
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Connect') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                        @endauth

                    </x-slot>
                </x-jet-dropdown>

            </div>
        </div>
    </header>





</nav>
