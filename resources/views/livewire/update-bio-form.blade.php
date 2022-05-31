<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Bio') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Some sentences of bio about you.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Twitter -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="twitter" value="{{ __('twitter') }}" />
            <x-jet-input id="twitter" type="text" class="mt-1 block w-full" wire:model.defer="twitter" autocomplete="twitter" />
            <x-jet-input-error for="twitter" class="mt-2" />
        </div>

        <!-- Bio -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bio" value="{{ __('bio') }}" />
            <textarea id="bio" rows="3" type="text" class="mt-1 block w-full border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 " wire:model.defer="bio" autocomplete="bio"></textarea>
            <x-jet-input-error for="bio" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
