<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assets') }}
        </h2>
    </x-slot>

    <div id="topbar" STYLE="margin-top: 30px;">
        <a href="{{ route('assets.create') }}">
            <x-jet-button style="margin: 0 auto; display: block">{{ __('Neues Asset') }}</x-jet-button>
        </a>
    </div>

    <table cellpadding="0" cellspacing="0" style="margin-left: auto; margin-right: auto; margin-top: 50px">
        <thead>
        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left">
            <th class="px-4 py-2 bg-gray-200">{{ __('Name') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Typ') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Dateipfad') }}</th>
            <th class="px-4 py-2 bg-gray-200">{{ __('Objekt') }}</th>
            <th class="px-4 py-2 bg-gray-200"></th>
        </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
        @each('assets.dataset', $assets, 'asset', 'assets.no-dataset')
        </tbody>
    </table>
</x-app-layout>
