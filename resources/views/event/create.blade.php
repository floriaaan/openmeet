<x-app-layout>
    <form action="{{ route('event.store') }}" method="POST">
        @csrf
        <section class="text-gray-600 body-font relative">
            <div class="container md:px-5 py-5 mx-auto flex sm:flex-nowrap flex-wrap">

                <div
                    class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 px-2 md:pl-5">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Post-ironic portland shabby chic echo park, banjo
                        fashion
                        axe</p>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-100 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="group_id" class="leading-7 text-sm text-gray-600">Group</label>
                        <select name="group_id" id="group_id"
                            class="block appearance-none w-full bg-gray-100 border border-gray-100 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach (Auth::user()->groups_admin() as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                        <textarea id="description" name="description" rows="5"
                            class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-100 transition-colors duration-200 ease-in-out">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">{{ __('messages.create') }}</button>
                    <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook
                        viral
                        artisan.</p>
                </div>

                <div
                    class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:ml-10 p-10 flex items-end justify-start relative">
                    <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                        marginheight="0" marginwidth="0" scrolling="no"
                        src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Rouen&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                        {{-- style="filter: grayscale(1) contrast(1.2) opacity(0.4);" --}}></iframe>
                    <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                        <div class="lg:w-1/2 px-6">
                            <div class="relative">
                                <label for="date_start" class="leading-7 text-sm text-gray-600">Start date</label>
                                <input type="date" id="date_start" name="date_start" value="{{ old('date_start') }}"
                                    class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-100 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                            <div class="relative">
                                <label for="date_end" class="leading-7 text-sm text-gray-600">End date</label>
                                <input type="date" id="date_end" name="date_end" value="{{ old('date_end') }}"
                                    class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-100 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</x-app-layout>
