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
                    <x-jet-button type="submit" class="">
                        Save
                    </x-jet-button>
                </div>

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
                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                        <!-- Profile Photo File Input -->
                        <input type="file" name="thumbnail" class="hidden"
                                    x-ref="photo"
                                    x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <span class="block  aspect-video bg-cover bg-no-repeat bg-center"
                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>

                        <x-jet-secondary-button class="mt-4 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Pilih file foto') }}
                        </x-jet-secondary-button>

                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>
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
