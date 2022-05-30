<x-app-layout>
    <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
        <div class="flex-1">
            <div class="text-sm text-slate-600 md:flex md:justify-between">
                <div class="flex items-center gap-4">
                    <span>CATEGORY</span>
                    <a href="/">
                        <span class="bg-slate-200 py-2 px-6 rounded-full hover:bg-slate-300">Laravel</span>
                    </a>
                </div>
                <div class="flex items-center gap-6 py-6">
                    <button class="font-semibold text-slate-900 hover:text-slate-700">Resent</button>
                    <button class="hover:text-slate-700">Popular</button>
                    <button class="hover:text-slate-700">Trending</button>
                </div>
            </div>
            <section class="border-t py-8">
                <ul class="space-y-12">
                    @foreach ( range(1, 5) as $item)
                    <li class="flex gap-6">
                        <div class="shrink-0">
                            <img class="object-cover w-24 h-24 md:h-36 md:w-48" src="{{ asset('images/martin-eriksson-iIwkNVPI7vQ-unsplash.jpg') }}" alt="">
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center mb-2 text-xs md:text-sm justify-between text-slate-600 ">
                                <div class="flex items-center space-x-2">
                                    <img class="object-cover w-6 h-6 rounded-full" src="{{ asset('images/martin-eriksson-iIwkNVPI7vQ-unsplash.jpg') }}" alt="">
                                    <span><a href="/" class="font-semibold">Dede Iskandar</a></span>
                                    <span> ·  29 Mei 2022</span>
                                </div>
                                <!-- Dropdown Container -->
                                <div x-data="{ open: false }" class="relative inline-block">
                                    <!-- Dropdown Toggle Button -->
                                    <button
                                        type="button"
                                        id="tk-dropdown-simple"
                                        aria-haspopup="true"
                                        x-bind:aria-expanded="open"
                                        x-on:click="open = true"
                                        class="p-1 rounded-full hover:bg-slate-200">
                                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"></path>
                                            <path fill="currentColor" d="M9 12C9 12.5523 8.55228 13 8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12Z"></path>
                                            <path fill="currentColor" d="M17 12C17 12.5523 16.5523 13 16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12Z"></path>
                                        </svg>
                                    </button>
                                    <!-- END Dropdown Toggle Button -->

                                    <!-- Dropdown -->
                                    <div
                                    x-show="open"
                                    x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="transform opacity-0 scale-75"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-75"
                                    x-on:click.outside="open = false"
                                    role="menu"
                                    aria-labelledby="tk-dropdown-simple"
                                    class="absolute right-0 origin-top-right mt-2 w-40 shadow-xl overflow-hidden border rounded z-10"
                                    >
                                    <div class="bg-white ring-1 ring-black ring-opacity-5 rounded divide-y divide-gray-100">
                                        <div class="space-y-1">
                                            <a role="menuitem" href="javascript:void(0)" class="flex items-center space-x-2 py-2 px-4 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                                <span>Mark As Spam</span>
                                            </a>
                                            <a role="menuitem" href="javascript:void(0)" class="flex items-center space-x-2 py-2 px-4 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                                <span>Not Spam</span>
                                            </a>
                                        </div>
                                        <div class="space-y-1">
                                            <a role="menuitem" href="javascript:void(0)" class="flex items-center space-x-2 py-2 px-4 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                                <span>Edit</span>
                                            </a>
                                            <a role="menuitem" href="javascript:void(0)" class="flex items-center space-x-2 py-2 px-4 text-sm font-medium text-red-600 hover:bg-red-700 hover:text-white focus:outline-none focus:bg-red-700 focus:text-white">
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- END Dropdown Container -->

                            </div>
                            <a href="/single">
                                <h2 class="text-lg md:text-xl font-black hover:underline leading-tight">The Earth Was Silent For 4 Billion Years</h2>
                            </a>
                            <p class="hidden text-slate-600 md:block">Many in the mental health field are beginning to question what’s behind the alarming increase in suicide among Black Americans,</p>
                            <div class="flex text-sm justify-between">
                                <div class="flex items-center space-x-3">
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
                                <div class="text-red-600">
                                    Spam Reports : 6
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </section>

        </div>

        <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
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
    </div>

</x-app-layout>
