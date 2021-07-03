<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Benutzer') }}
        </h2>
    </x-slot>

    <div STYLE="margin-left: 100px; margin-right: 100px; padding-bottom: 40px;">
        <livewire:user-grid-view/>
    </div>

</x-app-layout>
