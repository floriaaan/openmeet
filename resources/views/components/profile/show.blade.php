<div class="px-4 py-5 h-full sm:p-6 bg-gray-800 shadow sm:rounded-lg">


    <div class="flex flex-col justify-center items-center  text-white">
        <img class="h-32 w-32 rounded-full hover:shadow-lg transition duration-300 ease-in-out"
            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&amp;color=EF4444&amp;background=FECACA"
            alt="{{ Auth::user()->name }}" />

        <div class="max-w-xl text-lg mt-4 font-bold uppercase tracking-widest ">
            {{ Auth::user()->name }}
        </div>

        <div class="text-sm tracking-wide flex items-center">
            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                    clip-rule="evenodd" />
            </svg>
            {{ __('messages.memberSince') }}
            {{ utf8_encode(strftime('%a %d %b %Y', strtotime(Auth::user()->created_at))) }}
        </div>

        <div class="flex-row mt-2">
            <span class="hidden sm:block">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 bg-gray-50 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-primary-500 hover:text-white active:bg-primary-900 focus:outline-none focus:border-primary-900  disabled:opacity-25 transition ease-in-out duration-150 focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">

                    <i class="fas flex fa-link mr-2 h-5 w-5 items-center"></i>
                    {{ __('messages.api') }}
                </a>
            </span>
        </div>
    </div>


</div>
