<x-guest-layout>

    <div class="bg-gradient-to-br from-primary-300 to-primary-600 min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">

        <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-lg">
            <section>
                <h3 class="font-bold text-2xl">Welcome to {{ env('APP_NAME', 'OpenMeet') }}</h3>
                <p class="text-gray-600 pt-2">Create your account.</p>
            </section>

            <section class="mt-10">
                <form class="flex flex-col" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2 pt-3 ">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>
                    <div class="mb-2 pt-3 ">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>
                    <div class="mb-2 pt-3">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>
                    <div class="mb-2 pt-3">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="my-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                    <div class="flex justify-end">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-primary-600 hover:text-primary-700 hover:underline mb-6"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <button
                        class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                        type="submit">{{ __('messages.auth.register') }}</button>
                </form>
            </section>
        </main>

        <div class="max-w-lg mx-auto text-center mt-12 mb-6">
            <p class="text-white">{{ __('messages.auth.register.title') }} <a href="{{ route('login') }}"
                    class="font-bold hover:underline">{{ __('messages.auth.login') }}</a>.</p>
        </div>

        <footer class="max-w-lg mx-auto flex justify-center text-white">
            <a href="#" class="hover:underline">Contact</a>
            <span class="mx-3">•</span>
            <a href="#" class="hover:underline">Privacy</a>
        </footer>
    </div>
</x-guest-layout>
