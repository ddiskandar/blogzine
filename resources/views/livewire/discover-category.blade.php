<div>
    <h2 class="text-sm font-bold uppercase">DISCOVER MORE OF WHAT MATTERS TO YOU</h2>
    <ul class="flex flex-wrap gap-2 mt-4">
        @foreach ($categories as $category)
        <li>
            <a href="{{ route('category.show', $category->slug) }}" class="inline-block px-4 py-2 text-sm border rounded-sm text-slate-600 border-slate-300">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
