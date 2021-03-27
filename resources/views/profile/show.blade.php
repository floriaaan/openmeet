<x-app-layout>
    <div class="bg-gray-50">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 gap-4">


                <div class="grid gap-4">

                    <div class="mt-10 sm:mt-0 flex flex-row gap-4">
                        <div class="w-1/3 h-full">
                            <x-profile.show />
                        </div>

                        <div class="w-2/3">
                            @livewire('profile.update-password-form')
                        </div>
                    </div>





                    <div class="mt-10 sm:mt-0 flex flex-row gap-4">
                        <div class="w-2/3 h-full">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                        <div class="w-1/3 flex flex-col gap-4">
                            <div class="col-span-2">
                                @livewire('profile.delete-user-form')
                            </div>

                            <div class="col-span-2">
                                @livewire('profile.two-factor-authentication-form')
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
