<x-jet-form-section submit="updatePassword">
    {{-- <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot> --}}

    <x-slot name="form">
        <h3 class="text-lg font-medium mb-2 text-gray-900">
            {{ __('messages.password.update') }}
        </h3>
        <div class="flex flex-col">
            <div class="mb-3">
                <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password" type="password" class="mt-1 block w-full"
                    wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="mt-2" />
            </div>
            <div class="flex space-x-5 flex-row">
                <div class=" w-1/2">
                    <x-jet-label for="password" value="{{ __('New Password') }}" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full"
                        wire:model.defer="state.password" autocomplete="new-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>

                <div class="w-1/2">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                        wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>
            </div>
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            <i class="fas flex fa-check mr-2 h-4 w-4 items-center"></i>

            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
