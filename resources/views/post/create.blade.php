<x-app-layout>
    <form action="/post" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container md:flex md:items-start gap-6 md:gap-12 justify-between px-4 mx-auto md:px-8">
            <div class="flex-1 py-6 space-y-6">
                <!-- Title -->
                <div>
                    <x-jet-label class="mb-2" for="title" value="{{ __('Judul') }}" />
                    <x-jet-input id="title" type="text" name="title" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" value="{{ old('title') }}" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>

                <!-- Body -->
                <div>
                    <x-jet-label class="mb-2" for="body" value="{{ __('Tell your story') }}" />
                    <textarea id="body" name="body">{{ old('body') }}</textarea>
                    <x-jet-input-error for="body" class="mt-2" />
                </div>
            </div>

            <div class="max-w-xl md:border-l border-t md:border-t-0 py-6 min-h-screen md:sticky md:top-0 md:w-1/3 px-4 md:px-8 space-y-2">
                <div class="flex gap-4 w-full">
                    <x-jet-secondary-button type="submit" class="">
                        Save Changes
                    </x-jet-secondary-button>

                    <x-jet-button type="submit" class="">
                        Publish Now
                    </x-jet-button>
                </div>

                {{-- <div class="py-4">
                    <a href="/">
                        <div class="flex items-center gap-2">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.75 13.25L18 12C19.6569 10.3431 19.6569 7.65685 18 6V6C16.3431 4.34315 13.6569 4.34315 12 6L10.75 7.25"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.25 10.75L6 12C4.34315 13.6569 4.34315 16.3431 6 18V18C7.65685 19.6569 10.3431 19.6569 12 18L13.25 16.75"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.25 9.75L9.75 14.25"></path>
                            </svg>
                            <span class="block font-medium text-sm text-gray-700">Visit URL</span>
                        </div>
                    </a>
                </div> --}}

                <div class="py-2">
                    <x-jet-label class="mb-2" for="categoryId" value="{{ __('Kategory') }}" />
                    <select id="categoryId" name="categoryId" autocomplete="categoryId" class="mt-1 block w-full py-2 px-3 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 sm:text-sm">
                        <option value="">-- Pilih salah satu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="categoryId" class="mt-2" />

                </div>

                <div class="py-2">
                    <div class="block mb-2 font-medium text-sm text-gray-700">Thumbnail</div>
                    <input type="file" name="thumbnail" id="thumbnail">
                    {{-- <img name="thumbnail" class="aspect-video object-cover" src="{{ asset('images/martin-eriksson-iIwkNVPI7vQ-unsplash.jpg') }}" alt=""> --}}
                    <x-jet-input-error for="thumbnail" class="mt-2" />

                </div>
            </div>
        </div>
    </form>

    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.tiny.cloud/1/biu5v3i108u26wndft68k12y1wnn0vagymv04gxpalv0gaaw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#body',
          menubar: false
        });
    </script>
    @endpush

</x-app-layout>
