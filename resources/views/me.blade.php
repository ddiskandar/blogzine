<x-app-layout>
    <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
        <div class="flex-1">
            @livewire('me-show')
        </div>

        <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
            <img class="w-24 h-24 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
            <div class="font-semibold mt-4">{{ auth()->user()->name }}</div>
            <div class="mt-4">
                <x-jet-label>Username</x-jet-label>
                <div>{{ auth()->user()->username }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Email</x-jet-label>
                <div>{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Twitter</x-jet-label>
                @if (auth()->user()->profile->twitter)
                <div> <a href="https://twitter.com/{{ auth()->user()->profile->twitter }}">{{ '@' . auth()->user()->profile->twitter }}</a></div>
                @else
                <div> - </div>
                @endif
            </div>
            <div class="mt-4">
                <x-jet-label>Bio</x-jet-label>
                <p>{{ auth()->user()->profile->bio }}</p>
            </div>
            <div class="mt-4">
                <a href="/user/profile">
                    <x-jet-secondary-button>Edit Profile</x-jet-secondary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
