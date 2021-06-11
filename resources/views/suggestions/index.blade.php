<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vorschläge') }}
        </h2>
    </x-slot>

    <x-jet-button wire:click="createShowModal" style="margin-left: auto; margin-right: auto">
        {{ __('Create') }}
    </x-jet-button>

    <table cellpadding="0" cellspacing="0" style="margin-left: auto; margin-right: auto; margin-top: 50px">
        <thead>
        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left">
            <th class="px-4 py-2 bg-gray-200">{{ __('Titel') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Beschreibung') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Latitude') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Longitude') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Geojson') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Asset') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Erstellt von') }}</th>
            <th class="px-4 py-2 bg-gray-200"></th>
        </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
        @each('suggestions.dataset', $suggestions, 'suggestion', 'suggestions.no-dataset')
        </tbody>
    </table>
</x-app-layout>
