<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projekte') }}
        </h2>
    </x-slot>

    <table cellpadding="0" cellspacing="0" style="margin-left: auto; margin-right: auto; margin-top: 50px">
        <thead>
        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left">
            <th class="px-4 py-2 bg-gray-200">{{ __('Name') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Beschreibung') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Inhalt') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Sichtbar') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Art') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Startzeit') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Endzeit') }}</th>
            <th class="px-4 py-2 bg-gray-200"></th>
        </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
        @each('projects.dataset', $projects, 'project', 'projects.no-dataset')
        </tbody>
    </table>
</x-app-layout>
