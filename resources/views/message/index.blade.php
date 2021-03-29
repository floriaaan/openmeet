<x-app-layout>
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-col lg:flex-row h-full w-full overflow-x-hidden">
            <div class="hidden lg:flex flex-col lg:w-1/4 py-4 pl-6 pr-2 bg-white flex-shrink-0">

                <div class="flex flex-col items-center bg-yellow-50  w-full py-6 px-4 rounded-lg">
                    <div class="h-20 w-20 rounded-full overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=FBBF24&background=FCF0CF"
                            alt="Avatar" class="h-full w-full" />
                    </div>
                    <div class="text-sm font-semibold text-yellow-500 mt-2">{{ auth()->user()->name }}</div>

                </div>
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row items-center justify-between text-xs">
                        <span class="font-bold">{{ __('messages.message.conversation') }}</span>
                        <span
                            class="flex items-center justify-center bg-gray-200 font-bold h-4 w-4 rounded-full">{{ count($conversations_list) }}</span>
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2 max-h-96 overflow-y-auto">
                        @forelse ($conversations_list as $conversation)
                            <a href="{{ route('message.show', ['user_id' => $conversation['user']->id]) }}"
                                class="flex flex-row items-center hover:bg-gray-100 rounded-lg p-2">
                                <div
                                    class="flex items-center justify-center h-12 w-12 bg-yellow-200 text-yellow-600 font-semibold rounded-full">
                                    {{ $conversation['user']->getAcronym() }}
                                </div>
                                <div class="ml-2 flex flex-col">
                                    <h6 class="text-sm font-semibold">{{ $conversation['user']->name }}</h6>
                                    <p class="text-sm font-thin">
                                        @if ($conversation['message']->sender_id == auth()->id())
                                            <i>{{ __('messages.message.you') }} :</i>
                                        @endif
                                        {{ $conversation['message']->content }}
                                    </p>
                                    <small
                                        class="text-xs text-gray-400">{{ $conversation['message']->updated_at }}</small>
                                </div>
                            </a>
                        @empty
                            <p class="h-24 flex justify-center items-center">
                                {{ __('messages.message.conversation.empty') }}
                            </p>
                        @endforelse


                    </div>

                </div>
            </div>
            <div class="flex flex-col lg:w-3/4 flex-auto p-4" style="height: 87vh">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-lg bg-gray-100 h-full p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            @if (isset($messages))
                                <div class="grid grid-cols-12 gap-y-2">
                                    @forelse ($messages as $message)

                                        @if ($message->sender_id != auth()->id())
                                            <div class="col-start-1 col-end-8 p-3 rounded-sm">
                                                <div class="flex flex-row items-center">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-yellow-200 text-yellow-600 font-bold flex-shrink-0">
                                                        {{ \App\Models\User::find($message->sender_id)->getAcronym() }}
                                                    </div>
                                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-lg">
                                                        <div>{{ $message->content }}</div>

                                                    </div>
                                                </div>
                                                <div class="float-left my-1 text-xs text-gray-400">
                                                    {{ $message->created_at }}
                                                </div>
                                            </div>

                                        @else
                                            <div class="col-start-6 col-end-13 p-3 rounded-sm">
                                                <div class="flex items-center justify-start flex-row-reverse ">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-200 text-gray-600 font-bold flex-shrink-0">
                                                        {{ \App\Models\User::find($message->sender_id)->getAcronym() }}
                                                    </div>
                                                    <div class="relative mr-3 text-sm bg-white py-2 px-4 shadow rounded-lg">
                                                        <div>{{ $message->content }}</div>

                                                    </div>
                                                </div>

                                                @if ($loop->last)
                                                    <div class="float-right flex flex-row my-1 text-xs text-gray-400">
                                                        {{ $message->created_at }} <span class="mx-1">&bull;</span>
                                                        @if (!$message->is_read)
                                                            <div class="font-bold">
                                                                {{ __('messages.message.read.not') }}</div>
                                                        @else
                                                            <div class="font-bold">
                                                                {{ __('messages.message.read') }}</div>

                                                        @endif
                                                    </div>

                                                @else
                                                    <div class="float-right my-1 text-xs text-gray-400">
                                                        {{ $message->created_at }}
                                                    </div>
                                                @endif

                                            </div>

                                        @endif




                                    @empty
                                        <p class="col-span-12 w-full flex justify-center items-center h-96">
                                            {{ __('messages.message.conversation.empty') }}</p>
                            @endforelse

                        </div>
                    @else
                        <p class="w-full flex justify-center items-center h-96">
                            {{ __('messages.message.conversation.empty') }}</p>
                        @endif

                    </div>
                </div>
                @if (isset($messages) && $messages != null)
                    <form action="{{ route('message.create') }}" method="POST">
                        @csrf
                        <div class="flex flex-row items-center h-16 rounded-lg bg-white w-full px-4">
                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input type="text" name="content"
                                        class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-100 transition-colors duration-200 ease-in-out" />
                                    <button
                                        class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="h-2/3 ml-4">
                                <button type="submit"
                                    class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 rounded-md text-white px-4 py-1 h-full flex-shrink-0">
                                    <span>{{ __('messages.message.send') }}</span>
                                    <span class="ml-2">
                                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <input hidden name="receiver_id" value={{ $receiver_id }} />
                    </form>
                @endif
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
