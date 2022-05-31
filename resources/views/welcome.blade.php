<x-guest-layout>
    <header class="py-4 border-b border-black bg-emerald-400">
        <div class="container flex items-center justify-between px-4 mx-auto md:px-8">
            <a href="/" class="flex items-center">
                <x-jet-application-mark class="block h-9 w-auto" />
                <h1 class="font-serif text-3xl ml-2">Blogzine</h1>
            </a>
            @auth
            <div>
                <a href="{{ route('home') }}"
                class="px-4 py-2 text-sm text-white bg-black hover:bg-gray-900 rounded-full">
                    Home
                </a>
            </div>
            @else
            <ul class="flex justify-end gap-4 text-sm">
                <li>
                    <button>
                        <a href="/login">Log in</a>
                    </button>
                </li>
                <li>
                    <div>
                        <a href="/register"
                        class="px-4 py-2 text-sm text-white bg-black hover:bg-gray-900 rounded-full">
                            Register
                        </a>
                    </div>
                </li>
            </ul>
            @endauth
        </div>
    </header>
    <section class="border-b border-black bg-emerald-400" id="hero" >
        <div class="container relative px-4 mx-auto md:px-8">
            <div class="py-20 flex-2">
                <h1 class="font-serif text-8xl">Stay curious.</h1>
                <p class="max-w-md mt-6 text-2xl leading-tight">Discover stories, thinking, and expertise from writers on any topic.</p>
                <a href="{{ route('home') }}" class="">
                    <button class="px-12 py-2 mt-8 text-xl text-white bg-black hover:bg-gray-900 rounded-full">Start reading</button>
                </a>
            </div>
            <div class="absolute bottom-0 flex-1 hidden right-24 md:block">
                <img class="w-[500px] " src="{{ asset('images/undraw_content_creator_re_pt5b.svg') }}" alt="">
            </div>
        </div>
    </section>

    <section class="py-8 border-b md:py-12 border-slate-300k">
        <div class="container px-4 mx-auto md:px-8">
            @livewire('welcome-trending')
        </div>
    </section>
    <section class="mb-6 md:py-12">
        <div class="container flex flex-col gap-8 px-4 mx-auto md:gap-14 md:flex-row-reverse md:items-start md:justify-between md:px-8">
            <div class="md:max-w-sm py-8 border-b md:sticky md:top-8 md:py-0 border-slate-300 md:border-0">
                @livewire('discover-category')
            </div>

            @livewire('welcome-recent')

        </div>
    </section>

</x-guest-layout>
