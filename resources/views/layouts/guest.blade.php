<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Reallabor: Corrensstraße') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

        <!-- Scripts -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="w-full hidden fixed top-0 right-0 px-6 py-4 sm:flex z-50 align-center justify-between bg-green-500 bg-opacity-75 shadow">
            <div>
                {{ __('Reallabor') }}: <strong>{{ __('Corrensstraße') }}</strong>
            </div>
            <div>
                <a href="{{ route('index') }}" class="text-sm text-gray-700 underline">{{ __('Start') }}</a>
                <a href="{{ route('map') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Karte') }}</a>
                <a href="{{ route('timeline') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Agenda') }}</a>
                <a href="{{ route('about') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Über das Projekt') }}</a>
                @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Anmelden') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Konto erstellen') }}</a>
                            @endif
                        @endauth
                @endif
            </div>
        </div>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
