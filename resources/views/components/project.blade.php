<div class="w-full sm:rounded sm:overflow-hidden shadow">
    <div class="h-40 w-full bg-center" style="background: url('{{ $image }}'); background-size: cover;"></div>
    <div class="w-full p-6 bg-white">
        <h3 class="w-full uppercase tracking-wider font-bold text-green-800 mb-2">{{ $title }}</h3>
        <p class="text-justify text-gray-800">{{ $description }}</p>
        <div class="w-full mt-6 text-sm">
            <span class="font-bold">ProjektmitarbeiterInnen:</span><br />
            <span class="text-gray-700">{{ $people }}</span>
        </div>
        @if ($link)
            <a href="{{ $link }}" target="_blank">
                <div class="mt-4 text-sm text-green-500 cursor-pointer hover:underline">Weitere Informationen</div>
            </a>
        @endif
    </div>
</div>
