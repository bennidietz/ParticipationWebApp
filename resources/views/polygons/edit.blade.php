<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $polygon->id ? __('Polygon bearbeiten') : __('Polygon erstellen') }}
        </h2>
    </x-slot>

    <form action="{{ $polygon->id ? route('polygons.update', $polygon) : route('polygons.store') }}" method="POST">
        @csrf
        @if ($polygon->id)
            @method('PUT')
        @endif
        <div style="width: 20%; margin: 0 auto; margin-top: 50px">
            <div>
                <label for="title">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name', $polygon->name) }}" placeholder="optional" />
            </div>
            <div>
                <label for="geojson">{{ __('Geojson') }}</label>
                <input id="geojson" type="text" name="geojson" value="{{ old('geojson', $polygon->geojson) }}" placeholder="optional" />
            </div>
            <div>
                <label for="description">{{ __('Description') }}</label>
                <input id="description" type="text" name="description" value="{{ old('description', $polygon->description) }}" placeholder="optional" />
            </div>

            <div>
                <label for="state">{{ __('Typ') }}</label>
                <select id="state" name="state" size="1" required>
                    @if (!old('state', $polygon->state))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('state', $polygon->state) == "selectable")
                        <option value="selectable" selected>{{ __('In Bearbeitung') }}</option>
                    @else
                        <option value="selectable">{{ __('In Bearbeitung') }}</option>
                    @endif
                    @if (old('state', $polygon->state) == "locked")
                        <option value="locked" selected>{{ __('Temporär gesperrt') }}</option>
                    @else
                        <option value="locked">{{ __('Temporär gesperrt') }}</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="visible">{{ __('Sichtbar') }}</label>
                <select id="visible" name="visible" size="1" required>
                    @if (!old('visible', $polygon->visible))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('visible', $polygon->visible) == 0)
                        <option value="1" selected>{{ __('Ja') }}</option>
                    @else
                        <option value="1">{{ __('Ja') }}</option>
                    @endif
                    @if (old('visible', $polygon->visible) == 1)
                        <option value="0" selected>{{ __('Nein') }}</option>
                    @else
                        <option value="0">{{ __('Nein') }}</option>
                    @endif
                </select>
            </div>
            <div style="margin: 20px;">
                <button>{{ __('Save') }}</button>
                <a value="cancel" href="{{ route('polygons.index') }}">
                    <button>{{ __('Cancel') }}</button>
                </a>
            </div>
        </div>
    </form>
</x-app-layout>
