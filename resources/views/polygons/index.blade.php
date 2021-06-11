<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polygone') }}
        </h2>
    </x-slot>

    <table cellpadding="0" cellspacing="0" style="margin-left: auto; margin-right: auto; margin-top: 50px">
        <thead>
        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left">
            <th class="px-4 py-2 bg-gray-200">{{ __('Name') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Geojson') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Status') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Beschreibung') }}</th>
            <th class="px-4 py-2 bg-gray-200"></th>
        </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
        @each('polygons.dataset', $polygons, 'polygon', 'polygons.no-dataset')
        </tbody>
    </table>
</x-app-layout>
