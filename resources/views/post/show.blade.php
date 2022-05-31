<x-app-layout>
    <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
        <div class="flex-1 py-6">
            <section class="md:flex md:items-center md:justify-between mb-6">
                <div class="flex items-center">
                    <div>
                        <img class=" object-cover aspect-square w-12 h-12 rounded-full" src="{{ $post->author->profile_photo_url }}" alt="">
                    </div>
                    <div class="ml-4">
                        <a href="{{ route('user.show', $post->author->username) }}" class="font-semibold hover:underline"><h3>{{ $post->author->name }}</h3></a>
                        <div class="text-sm text-slate-600">
                            {{ $post->category->created_at->isoFormat('DD MMMM YYYY') }} · {{ $post->readTime() }} menit baca ·
                            <a href="{{ route('category.show', $post->category->slug) }}">
                                <span class="hover:underline">{{ $post->category->name }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-8 mt-6 md:mt-0 text-slate-600">

                    @livewire('likes-and-comments-count', ['post' => $post])

                    <ul class="flex items-center gap-2 ">
                        <li class="text-sm">SHARE</li>
                        <li>
                            <a target="_blank" href="http://twitter.com/share?text={{ urlencode('"'.$post->title.'" by '. ($post->author->profile->twitter ? '@'.$post->author->profile->twitter : $post->author->name) . ' - ') }}&url={{ urlencode(route('post.show', $post->slug)) }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M20 5.34c-.67.41-1.4.7-2.18.87a3.45 3.45 0 0 0-5.02-.1 3.49 3.49 0 0 0-1.02 2.47c0 .28.03.54.07.8a9.91 9.91 0 0 1-7.17-3.66 3.9 3.9 0 0 0-.5 1.74 3.6 3.6 0 0 0 1.56 2.92 3.36 3.36 0 0 1-1.55-.44V10c0 1.67 1.2 3.08 2.8 3.42-.3.06-.6.1-.94.12l-.62-.06a3.5 3.5 0 0 0 3.24 2.43 7.34 7.34 0 0 1-4.36 1.49l-.81-.05a9.96 9.96 0 0 0 5.36 1.56c6.4 0 9.91-5.32 9.9-9.9v-.5c.69-.49 1.28-1.1 1.74-1.81-.63.3-1.3.48-2 .56A3.33 3.33 0 0 0 20 5.33" fill="#A8A8A8"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post.show', $post->slug)) }}&quote={{ urlencode('"'.$post->title.'" by '.$post->author->name.' - ') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M19.75 12.04c0-4.3-3.47-7.79-7.75-7.79a7.77 7.77 0 0 0-5.9 12.84 7.77 7.77 0 0 0 4.69 2.63v-5.49h-1.9v-2.2h1.9v-1.62c0-1.88 1.14-2.9 2.8-2.9.8 0 1.49.06 1.69.08v1.97h-1.15c-.91 0-1.1.43-1.1 1.07v1.4h2.17l-.28 2.2h-1.88v5.52a7.77 7.77 0 0 0 6.7-7.71" fill="#A8A8A8"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('post.show', $post->slug)) }}&title={{ urlencode('"'.$post->title.'" by '.$post->author->name.' - ') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z" fill="#A8A8A8"></path></svg>
                            </a>
                        </li>
                    </ul>

                </div>
            </section>
            <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

            <section class="pb-4">
                <img class="w-full aspect-video" src="{{ asset('images/martin-eriksson-iIwkNVPI7vQ-unsplash.jpg') }}" alt="">
            </section>

            <article class="prose max-w-none font-serif">
                {!! $post->body !!}
            </article>

            @livewire('like-post', ['post' => $post])

            @livewire('comment-post', ['post' => $post])

            @livewire('more-from-the-category', ['post' => $post])

        </div>

        <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
            <img class="w-24 h-24 rounded-full" src="{{ $post->author->profile_photo_url }}" alt="">
            <div class="font-semibold hover:underline mt-4"><a href="{{route('user.show', $post->author->username)}}">{{ $post->author->name }}</a></div>
            <div class="mt-4">
                <x-jet-label>Username</x-jet-label>
                <div>{{ $post->author->username }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Email</x-jet-label>
                <div>{{ $post->author->email }}</div>
            </div>
            <div class="mt-4">
                <x-jet-label>Twitter</x-jet-label>
                @if ($post->author->profile->twitter)
                <div> <a href="https://twitter.com/{{ $post->author->profile->twitter }}">{{ '@' . $post->author->profile->twitter }}</a></div>
                @else
                <div> - </div>
                @endif
            </div>
            <div class="mt-4">
                <x-jet-label>Bio</x-jet-label>
                <p>{{ $post->author->profile->bio }}</p>
            </div>

            @if ($author_posts->count() > 0)
            <div>
                <div class="text-sm font-semibold mt-6 ">Stories From The Author</div>
                <ul class="space-y-1 mt-4">
                    @foreach ($author_posts as $post)
                    <li class="py-2 flex gap-4">
                        <div class="shrink-0">
                            <img class="object-cover w-14 h-14 " src="{{ $post->thumbnail() }}" alt="">
                        </div>
                        <div>
                            <div class="text-sm">
                                {{ $post->published_at->isoFormat('DD MMMM YYYY') }} · {{ $post->category->name }}
                            </div>
                            <a href="{{ route('post.show', $post->slug) }}">
                                <h2 class="text-md font-bold hover:underline leading-tight">{{ $post->title }}</h2>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>
