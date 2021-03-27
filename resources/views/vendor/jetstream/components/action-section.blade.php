<div class="{{ isset($title) && isset($description) ? 'md:grid md:grid-cols-3 md:gap-6' : '' }} " {{ $attributes }}>
    @if (isset($title) && isset($description))
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-jet-section-title>
    @endif

    <div class="
    {{ isset($title) && isset($description) ? 'mt-5 md:mt-0 md:col-span-2' : '' }}">
        <div class="px-4 py-5 h-full sm:p-6 bg-white shadow sm:rounded-lg">
            {{ $content }}
        </div>
    </div>
</div>
