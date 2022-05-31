<section>
    <div class="py-6 space-y-2">
        @auth
            <div>Berikan komentar</div>
            <textarea wire:model.defer="body" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="" id="" rows="3"></textarea>
            <x-jet-input-error for="body" class="mt-1" />
            <x-jet-button wire:click="send">Kirim Komentar</x-jet-button>
        @else
            <div class="text-slate-600">Silahkan <a class="font-semibold" href="/login">login</a> atau <a class="font-semibold" href="/register">daftar</a> untuk mulai berkomentar</div>
        @endauth
    </div>
    <div>
        <div>Komentar ({{ $comments_count }})</div>
        <ul class="divide-y space-y-2">
            @forelse ($comments as $comment)
            <li class="flex items-start py-4">
                <div class="shrink-0">
                    <img class=" object-cover aspect-square w-12 h-12 rounded-full" src="{{ $comment->author->profile_photo_url }}" alt="">
                </div>
                <div class="ml-4 flex-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <a href="{{ route('user.show', $comment->author->username) }}" class="font-semibold hover:underline">{{ $comment->author->name }}</a>
                            <span class="text-slate-600 text-sm"> pada {{ $comment->created_at->isoFormat('DD MMMM YYYY') }}</span>
                        </div>
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
                                    <button wire:click="markAsSpam({{ $comment->id }})" x-on:click="open = false" " class="flex w-full items-center space-x-2 py-2 px-4 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                        <span>Mark As Spam</span>
                                    </button>
                                    <button wire:click="notSpam({{ $comment->id }})" x-on:click="open = false" onclick="confirm('Spam report akan direset jadi 0. yakin?') || event.stopImmediatePropagation()" class="flex w-full items-center space-x-2 py-2 px-4 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                        <span>Not Spam</span>
                                    </button>
                                </div>
                                <div class="space-y-1">
                                    <button wire:click="delete({{ $comment->id }})" x-on:click="open = false" onclick="confirm('Yakin mau dihapus?') || event.stopImmediatePropagation()" class="flex w-full items-center space-x-2 py-2 px-4 text-sm font-medium text-red-600 hover:bg-red-700 hover:text-white focus:outline-none focus:bg-red-700 focus:text-white">
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @if ($comment->spam_reports > 0)
                        <div class="text-red-600 text-sm">
                            Spam Reports : {{ $comment->spam_reports }}
                        </div>
                    @endif
                    <p class="text-slate-600 font-serif">{{ $comment->body }}</p>
                    <div class="flex text-sm justify-between items-center space-x-3">
                        <div class="flex items-center mt-2">
                            <button wire:click="like({{ $comment->id }})">
                                @if ($comment->isLikedBy(auth()->user()))
                                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" aria-label="clap"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.37.83L12 3.28l.63-2.45h-1.26zM15.42 1.84l-1.18-.39-.34 2.5 1.52-2.1zM9.76 1.45l-1.19.4 1.53 2.1-.34-2.5zM20.25 11.84l-2.5-4.4a1.42 1.42 0 0 0-.93-.64.96.96 0 0 0-.75.18c-.25.19-.4.42-.45.7l.05.05 2.35 4.13c1.62 2.95 1.1 5.78-1.52 8.4l-.46.41c1-.13 1.93-.6 2.78-1.45 2.7-2.7 2.51-5.59 1.43-7.38zM12.07 9.01c-.13-.69.08-1.3.57-1.77l-2.06-2.07a1.12 1.12 0 0 0-1.56 0c-.15.15-.22.34-.27.53L12.07 9z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.74 8.3a1.13 1.13 0 0 0-.73-.5.67.67 0 0 0-.53.13c-.15.12-.59.46-.2 1.3l1.18 2.5a.45.45 0 0 1-.23.76.44.44 0 0 1-.48-.25L7.6 6.11a.82.82 0 1 0-1.15 1.15l3.64 3.64a.45.45 0 1 1-.63.63L5.83 7.9 4.8 6.86a.82.82 0 0 0-1.33.9c.04.1.1.18.18.26l1.02 1.03 3.65 3.64a.44.44 0 0 1-.15.73.44.44 0 0 1-.48-.1L4.05 9.68a.82.82 0 0 0-1.4.57.81.81 0 0 0 .24.58l1.53 1.54 2.3 2.28a.45.45 0 0 1-.64.63L3.8 13a.81.81 0 0 0-1.39.57c0 .22.09.43.24.58l4.4 4.4c2.8 2.8 5.5 4.12 8.68.94 2.27-2.28 2.71-4.6 1.34-7.1l-2.32-4.08z"></path></svg>
                                @else
                                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" aria-label="clap"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.37.83L12 3.28l.63-2.45h-1.26zM13.92 3.95l1.52-2.1-1.18-.4-.34 2.5zM8.59 1.84l1.52 2.11-.34-2.5-1.18.4zM18.52 18.92a4.23 4.23 0 0 1-2.62 1.33l.41-.37c2.39-2.4 2.86-4.95 1.4-7.63l-.91-1.6-.8-1.67c-.25-.56-.19-.98.21-1.29a.7.7 0 0 1 .55-.13c.28.05.54.23.72.5l2.37 4.16c.97 1.62 1.14 4.23-1.33 6.7zm-11-.44l-4.15-4.15a.83.83 0 0 1 1.17-1.17l2.16 2.16a.37.37 0 0 0 .51-.52l-2.15-2.16L3.6 11.2a.83.83 0 0 1 1.17-1.17l3.43 3.44a.36.36 0 0 0 .52 0 .36.36 0 0 0 0-.52L5.29 9.51l-.97-.97a.83.83 0 0 1 0-1.16.84.84 0 0 1 1.17 0l.97.97 3.44 3.43a.36.36 0 0 0 .51 0 .37.37 0 0 0 0-.52L6.98 7.83a.82.82 0 0 1-.18-.9.82.82 0 0 1 .76-.51c.22 0 .43.09.58.24l5.8 5.79a.37.37 0 0 0 .58-.42L13.4 9.67c-.26-.56-.2-.98.2-1.29a.7.7 0 0 1 .55-.13c.28.05.55.23.73.5l2.2 3.86c1.3 2.38.87 4.59-1.29 6.75a4.65 4.65 0 0 1-4.19 1.37 7.73 7.73 0 0 1-4.07-2.25zm3.23-12.5l2.12 2.11c-.41.5-.47 1.17-.13 1.9l.22.46-3.52-3.53a.81.81 0 0 1-.1-.36c0-.23.09-.43.24-.59a.85.85 0 0 1 1.17 0zm7.36 1.7a1.86 1.86 0 0 0-1.23-.84 1.44 1.44 0 0 0-1.12.27c-.3.24-.5.55-.58.89-.25-.25-.57-.4-.91-.47-.28-.04-.56 0-.82.1l-2.18-2.18a1.56 1.56 0 0 0-2.2 0c-.2.2-.33.44-.4.7a1.56 1.56 0 0 0-2.63.75 1.6 1.6 0 0 0-2.23-.04 1.56 1.56 0 0 0 0 2.2c-.24.1-.5.24-.72.45a1.56 1.56 0 0 0 0 2.2l.52.52a1.56 1.56 0 0 0-.75 2.61L7 19a8.46 8.46 0 0 0 4.48 2.45 5.18 5.18 0 0 0 3.36-.5 4.89 4.89 0 0 0 4.2-1.51c2.75-2.77 2.54-5.74 1.43-7.59L18.1 7.68z"></path></svg>
                                @endif
                            </button>
                            <span class="ml-2 ">{{ $comment->likes_count }}</span>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <li>
                <div>Belum ada komentar, jadi yang pertama berkomentar</div>
            </li>
            @endforelse
        </ul>
        @if ($take < $comments_count)
        <div class="py-12 flex justify-center w-full">
            <div wire:loading class="text-sm">
                Loading...
            </div>
            <button wire:loading.remove wire:click="more" type="button" class="py-1 px-6 border rounded-full bg-slate-50 hover:bg-slate-100 text-sm">Buka lebih banyak</button>
        </div>
        @endif
    </div>
</section>
