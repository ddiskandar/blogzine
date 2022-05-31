<div>
    <h2 class="text-sm font-bold uppercase">TRENDING ON BLOGZINE</h2>
            <ul class="grid py-4 text-sm gap-y-6 gap-x-8 dm:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                <li class="flex items-start">
                    <div class="text-3xl font-black text-slate-300">
                        0{{ $loop->iteration }}
                    </div>
                    <div class="flex-1 ml-4 space-y-1">
                        <div class="flex space-x-1">
                            <img class="object-cover w-6 h-6 rounded-full mr-2" src="{{ $post->author->profile_photo_url }}" alt="">
                            <div><a href="{{ route('user.show', $post->author->username) }}" class="font-semibold hover:underline">{{ $post->author->username }}</a></div>
                            <span>di</span>
                            <div><a href="{{ route('category.show', $post->category->slug) }}" class="font-semibold hover:underline">{{ $post->category->name }}</a></div>
                        </div>
                        <h3 class="font-black hover:underline"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
                        <div class="text-slate-600">{{ $post->published_at->isoFormat('DD MMMM YYYY') }} · {{ $post->readTime() }} menit baca</div>
                    </div>
                </li>
                @endforeach
            </ul>
</div>
