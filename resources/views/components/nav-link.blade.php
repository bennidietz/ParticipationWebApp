<a href="{{ route($route) }}" class="inline-block">
    <div class="h-full py-4 px-3 cursor-pointer transition @if (Route::is($route)) bg-green-600 text-white @else hover:bg-white hover:bg-opacity-10 @endif">
        {{ $label }}
    </div>
</a>
