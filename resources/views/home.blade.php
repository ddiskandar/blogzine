<x-app-layout>
    <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
        <div class="flex-1">
            @livewire('home-recent')
        </div>

        <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
            @livewire('discover-category')
        </div>
    </div>
</x-app-layout>
