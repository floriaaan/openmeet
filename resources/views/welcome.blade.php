@component('layouts.app')
    <div class="h-screen">
        <div class="grid grid-col-3 gap4">
            <div class="col-span-2">
                <div class="flex h-full min-w-full bg-red-900"></div>
            </div>
            <div class="w-1/3 p-3">

                <x-calendar />
            </div>

        </div>

    </div>
@endcomponent
