<x-app-layout>
    <form action="{{ !isset($group) ? route('group.store') : route('group.update', ['group' => $group]) }}"
        method="{{ !isset($group) ? 'POST' : 'POST' }}">
        @csrf
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-5 mx-auto flex sm:flex-nowrap flex-wrap">
                <div
                    class="hidden lg:w-1/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 md:flex items-end justify-start relative">
                    <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                        marginheight="0" marginwidth="0" scrolling="no"
                        src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Rouen&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                        {{-- style="filter: grayscale(1) contrast(1.2) opacity(0.4);" --}}></iframe>

                </div>
                <div class="lg:w-2/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-green-500 text-2xl mb-1 font-bold title-font">
                        {{ isset($group) ? __('messages.edit') . ' ' . $group->name : __('messages.group.create') }}
                    </h2>
                    <p class="leading-relaxed mb-5 text-gray-400">
                        {{ isset($group) ? __('messages.group.edit.description') : __('messages.group.create.description') }}
                    </p>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ isset($group) ? $group->name : old('name') }}"
                            class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-100 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="tags" class="leading-7 text-sm text-gray-600">Tags</label>
                        <input type="text" id="tags" name="tags"
                            value="{{ isset($group) ? $group->tags : old('tags') }}"
                            class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-100 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                        <textarea id="description" name="description"
                            class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-100 transition-colors duration-200 ease-in-out">{{ isset($group) ? $group->description : old('description') }}</textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">{{ isset($group) ? __('messages.edit') : __('messages.create') }}</button>
                    <p class="text-xs text-gray-500 mt-3">
                        {{ isset($group) ? __('messages.group.edit.bonus') : __('messages.group.create.bonus') }}</p>
                </div>
            </div>
        </section>

        @if (isset($group))
            <input hidden name="group_id" value="{{ $group->id }}" />
        @endif
    </form>

</x-app-layout>
