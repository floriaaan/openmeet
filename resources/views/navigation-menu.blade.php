<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">   

    <header class="text-gray-600 body-font shadow hidden md:block lg:block xl:block">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <div class="flex lg:w-2/5 pl-5 flex-wrap space-x-10 items-center text-base md:ml-auto">
            <div class="relative text-gray-600 w-2/3">
                <input type="search" name="serch" placeholder="{{ __('messages.search') }}" class="bg-white w-full border-primary-100 hover:border-primary-300 focus:border-primary-400 border-2 transition duration-300 h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                  </svg>
                </button>
              </div>
          </div>
          
          
          <a href="/" class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            <x-jet-application-mark class="block h-9 w-auto" />

            <span class="ml-3 text-xl font-bold">{{ env("APP_NAME") }}</span>
          </a>


          <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 pr-5 space-x-10 lg:ml-0">
            @auth
            <a href="#"
                class="h-8 w-8 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 bg-yellow-200 hover:bg-yellow-300 transition duration-150 ease-in-out"
                style="background-color: #fcf0cf;">
                <i class="fas fa-bell text-yellow-400"></i>
                @if(true)
                <span class="absolute rounded-full bg-red-600 h-2 w-2" style="margin-top: -28px; margin-right:-28px"></span>
                @endif
              </a>
            @else
              
            @endauth
            <a href="#"
                class="h-8 w-8 bg-green-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                >
                <i class="fas fa-users text-green-500"></i>
              </a>

            <a href="#"
              class="h-8 w-8 bg-blue-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
            >
              <i class="fas fa-calendar-alt text-blue-500"></i>
            </a>

            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @auth
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center  border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&amp;color=EF4444&amp;background=FECACA"
                                        alt="{{ Auth::user()->name }}" />

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif 
                    @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            
                            <span
                                class="h-8 w-8 bg-red-200 rounded-full flex items-center justify-center text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                                >
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

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
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
