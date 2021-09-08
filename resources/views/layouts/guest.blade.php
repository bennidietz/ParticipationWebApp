<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Lebensraum: Corrensstraße') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

        <!-- Scripts -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <!-- Popup -->
        <div id="popup" class="h-full w-full fixed top-0 left-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center" style="z-index: 1000;">
            <div class="max-h-screen max-w-full p-6 rounded-2xl shadow bg-white relative">
                <div class="absolute top-1 right-3 cursor-pointer text-gray-800 hover:text-black transition text-xl" onclick="document.getElementById('popup').style.display = 'none';">x</div>
                <div id="popup-content"></div>
            </div>
        </div>

        <div class="w-full fixed top-0 right-0 px-6 flex z-50 items-center justify-between bg-green-500 shadow" style="background: #7EC098;">
            <a href="{{ route('index') }}">
                <x-jet-application-mark />
            </a>
            <div class="flex justify-end items-center">
                <x-nav-link route="index" :label="__('Home')" />
                <x-nav-link route="corrensweek" :label="__('Correnswoche')" />
                <x-nav-link route="mobility" :label="__('Mobilität')" />
                <x-nav-link route="map" :label="__('Karte')" />
                @auth
                    <x-nav-link route="upload" :label="__('Neuer Vorschlag')" />
                @endauth
                {{--<x-nav-link route="about" :label="__('Mehr')" />--}}
                @if (Route::has('login'))
                        @auth
                            <x-nav-link route="dashboard" :label="__('Dashboard')" />
                        @else
                            <x-nav-link route="login" :label="__('Anmelden')" />
                        @endauth
                @endif
            </div>
        </div>
        <div class="min-h-screen font-sans bg-gray-100 text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <footer class="w-full p-6 bg-gray-600 text-white text-center text-xs text-gray-200">
            <a href="{{ route('impressum') }}" class="hover:underline">Impressum</a> | <a href="{{ route('privacy') }}" class="hover:underline">Datenschutz</a>
        </footer>
    </body>
</html>
