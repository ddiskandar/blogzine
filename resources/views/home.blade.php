<x-guest-layout>
    <header class="py-4 border-b border-black bg-emerald-400">
        <div class="container flex items-center justify-between px-4 mx-auto md:px-8">
            <div class="flex items-center">
                <x-jet-application-mark class="block h-9 w-auto" />
                <h1 class="font-serif text-3xl ml-2">Blogzine</h1>
            </div>
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
        </div>
    </header>
    <section class="border-b border-black bg-emerald-400" id="hero" >
        <div class="container relative px-4 mx-auto md:px-8">
            <div class="py-20 flex-2">
                <h1 class="font-serif text-8xl">Stay curious.</h1>
                <p class="max-w-md mt-6 text-2xl leading-tight">Discover stories, thinking, and expertise from writers on any topic.</p>
                <a href="/register" class="">
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
            <h2 class="text-sm font-bold uppercase">TRENDING ON BLOGZINE</h2>
            <ul class="grid py-4 text-sm gap-y-6 gap-x-8 dm:grid-cols-2 lg:grid-cols-3">
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        01
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        02
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        03
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        04
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        05
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        06
                    </div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div><span class="font-semibold">Dede Iskandar</span> in <span class="font-semibold">Categor</span></div>
                        <h3 class="font-black hover:underline"><a href="/single">The Age of Extinction Is Here — Some of Us Just Don’t Know It Yet</a></h3>
                        <div class="text-slate-600">29 Mei · 3 menit</div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="mb-6 md:py-12">
        <div class="container flex flex-col gap-8 px-4 mx-auto md:gap-24 md:flex-row-reverse md:items-start md:justify-between md:px-8">
            <div class="max-w-lg py-8 border-b md:sticky md:top-8 md:py-0 border-slate-300 md:border-0">
                <h2 class="text-sm font-bold uppercase">DISCOVER MORE OF WHAT MATTERS TO YOU</h2>
                <ul class="flex flex-wrap gap-2 mt-4">
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        <a href="/single">Hello</a>
                    </li>
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        <a href="/single">Livewire</a>
                    </li>
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        Laravel
                    </li>
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        Javascript
                    </li>
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        Framework
                    </li>
                    <li class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">
                        PHP
                    </li>
                </ul>
            </div>
            <ul class="space-y-12">
                @foreach ( range(1, 5) as $item)
                <li class="flex gap-6">
                    <div class="shrink-0">
                        <img class="object-cover w-24 h-24 md:h-36 md:w-48" src="{{ asset('images/martin-eriksson-iIwkNVPI7vQ-unsplash.jpg') }}" alt="">
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center text-xs md:text-sm justify-between text-slate-600 ">
                            <div>
                                <span><a href="/" class="font-semibold">Dede Iskandar</a></span>
                                <span class="hidden md:inline">pada</span> 29 Mei 2022
                            </div>
                            <a href="/">
                                <div class="bg-slate-100 hover:bg-slate-200 transition py-1 px-3 rounded-full">
                                    Technology
                                </div>
                            </a>
                        </div>
                        <a href="/single">
                            <h2 class="text-lg md:text-xl font-black hover:underline leading-tight">The Earth Was Silent For 4 Billion Years</h2>
                        </a>
                        <p class="hidden text-slate-600 md:block">Many in the mental health field are beginning to question what’s behind the alarming increase in suicide among Black Americans,</p>
                        <div class="flex text-sm items-center space-x-3">
                            <span>3 min baca</span>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" aria-label="clap"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.37.83L12 3.28l.63-2.45h-1.26zM13.92 3.95l1.52-2.1-1.18-.4-.34 2.5zM8.59 1.84l1.52 2.11-.34-2.5-1.18.4zM18.52 18.92a4.23 4.23 0 0 1-2.62 1.33l.41-.37c2.39-2.4 2.86-4.95 1.4-7.63l-.91-1.6-.8-1.67c-.25-.56-.19-.98.21-1.29a.7.7 0 0 1 .55-.13c.28.05.54.23.72.5l2.37 4.16c.97 1.62 1.14 4.23-1.33 6.7zm-11-.44l-4.15-4.15a.83.83 0 0 1 1.17-1.17l2.16 2.16a.37.37 0 0 0 .51-.52l-2.15-2.16L3.6 11.2a.83.83 0 0 1 1.17-1.17l3.43 3.44a.36.36 0 0 0 .52 0 .36.36 0 0 0 0-.52L5.29 9.51l-.97-.97a.83.83 0 0 1 0-1.16.84.84 0 0 1 1.17 0l.97.97 3.44 3.43a.36.36 0 0 0 .51 0 .37.37 0 0 0 0-.52L6.98 7.83a.82.82 0 0 1-.18-.9.82.82 0 0 1 .76-.51c.22 0 .43.09.58.24l5.8 5.79a.37.37 0 0 0 .58-.42L13.4 9.67c-.26-.56-.2-.98.2-1.29a.7.7 0 0 1 .55-.13c.28.05.55.23.73.5l2.2 3.86c1.3 2.38.87 4.59-1.29 6.75a4.65 4.65 0 0 1-4.19 1.37 7.73 7.73 0 0 1-4.07-2.25zm3.23-12.5l2.12 2.11c-.41.5-.47 1.17-.13 1.9l.22.46-3.52-3.53a.81.81 0 0 1-.1-.36c0-.23.09-.43.24-.59a.85.85 0 0 1 1.17 0zm7.36 1.7a1.86 1.86 0 0 0-1.23-.84 1.44 1.44 0 0 0-1.12.27c-.3.24-.5.55-.58.89-.25-.25-.57-.4-.91-.47-.28-.04-.56 0-.82.1l-2.18-2.18a1.56 1.56 0 0 0-2.2 0c-.2.2-.33.44-.4.7a1.56 1.56 0 0 0-2.63.75 1.6 1.6 0 0 0-2.23-.04 1.56 1.56 0 0 0 0 2.2c-.24.1-.5.24-.72.45a1.56 1.56 0 0 0 0 2.2l.52.52a1.56 1.56 0 0 0-.75 2.61L7 19a8.46 8.46 0 0 0 4.48 2.45 5.18 5.18 0 0 0 3.36-.5 4.89 4.89 0 0 0 4.2-1.51c2.75-2.77 2.54-5.74 1.43-7.59L18.1 7.68z"></path></svg>
                                <span>3</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" aria-label="responses" class="nt"><path d="M18 16.8a7.14 7.14 0 0 0 2.24-5.32c0-4.12-3.53-7.48-8.05-7.48C7.67 4 4 7.36 4 11.48c0 4.13 3.67 7.48 8.2 7.48a8.9 8.9 0 0 0 2.38-.32c.23.2.48.39.75.56 1.06.69 2.2 1.04 3.4 1.04.22 0 .4-.11.48-.29a.5.5 0 0 0-.04-.52 6.4 6.4 0 0 1-1.16-2.65v.02zm-3.12 1.06l-.06-.22-.32.1a8 8 0 0 1-2.3.33c-4.03 0-7.3-2.96-7.3-6.59S8.17 4.9 12.2 4.9c4 0 7.1 2.96 7.1 6.6 0 1.8-.6 3.47-2.02 4.72l-.2.16v.26l.02.3a6.74 6.74 0 0 0 .88 2.4 5.27 5.27 0 0 1-2.17-.86c-.28-.17-.72-.38-.94-.59l.01-.02z"></path></svg>
                                <span>3</span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </section>

</x-guest-layout>
