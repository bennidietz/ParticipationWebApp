@if (isset($route))
    <a href="{{ route($route) }}" class="inline-block">
@endif
    <div class="h-full py-4 px-3 cursor-pointer transition @if (isset($route) && Route::is($route)) bg-green-600 text-white @else hover:bg-white hover:bg-opacity-10 @endif">
        {{ $label }}
    </div>
@if (isset($route))
    </a>
@endif
