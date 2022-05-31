<x-app-layout>
    <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
        <div class="flex-1">
            @livewire('user-profile', ['user' => $user])
        </div>

        <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
            <img class="w-24 h-24 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
            <div class="font-semibold mt-4">{{ $user->name }}</div>
            <div class="mt-4">
                <x-jet-label>Username</x-jet-label>
                <div>{{ $user->username }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Email</x-jet-label>
                <div>{{ $user->email }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Twitter</x-jet-label>
                @if ($user->profile->twitter)
                <div> <a href="https://twitter.com/{{ $user->profile->twitter }}">{{ '@' . $user->profile->twitter }}</a></div>
                @else
                <div> - </div>
                @endif
            </div>
            <div class="mt-4">
                <x-jet-label>Bio</x-jet-label>
                <p>{{ $user->profile->bio }}</p>
            </div>
            @if (auth()->check() AND $user->id == auth()->id())
            <div class="mt-4">
                <a href="/user/profile">
                    <x-jet-secondary-button>Edit Profile</x-jet-secondary-button>
                </a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
