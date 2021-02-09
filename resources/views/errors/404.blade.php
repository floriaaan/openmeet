<x-app-layout>

    <div>
        
        <main
          aria-labelledby="pageTitle"
          class="flex items-center justify-center h-96 bg-gray-100 dark:bg-dark dark:text-light"
        >
          <div class="space-y-4">
            <div class="flex flex-col items-start space-y-3 sm:flex-row sm:space-y-0 sm:items-center sm:space-x-3">
              <p class="font-semibold text-primary-500 text-9xl dark:text-primary-600">404</p>
              <div class="space-y-2">
                <h1 id="pageTitle" class="flex items-center space-x-2">
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6 text-primary-500 dark:text-primary-600"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                    />
                  </svg>
                  <span class="text-xl font-medium text-gray-600 sm:text-2xl dark:text-light">
                    Oops! Page not found.
                  </span>
                </h1>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                  The page you are looking for was not found.
                </p>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                  You may return to
                  <a href="/" class="text-blue-600 hover:underline dark:text-blue-500">home page</a> or try
                  using the search form.
                </p>
              </div>
            </div>
  
            <form action="#" method="POST">
              <div class="flex items-center justify-center">
                <div class="relative text-gray-600 w-2/3">
                  <input type="search" name="serch" placeholder="{{ __('messages.search') }}" class="bg-white w-full border-gray-100 hover:border-primary-300 focus:border-primary-400 border-2 transition duration-300 h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                  <button type="submit" class="absolute right-0 top-0 mt-3 mr-4 hover:border-transparent">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </main>
        
        
      </div>
  

</x-app-layout>