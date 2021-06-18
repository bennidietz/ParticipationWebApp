<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $asset->id ? __('Asset bearbeiten') : __('Asset erstellen') }}
        </h2>
    </x-slot>

    <form action="{{ $asset->id ? route('assets.update', $asset) : route('assets.store') }}" method="POST">
        @csrf
        @if ($asset->id)
            @method('PUT')
        @endif
        <div style="width: 20%; margin: 0 auto; margin-top: 50px">
            <div>
                <label for="title">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name', $asset->name) }}" placeholder="optional" />
            </div>
            <div>
                <label for="file_path">{{ __('Dateipfad') }}</label>
                <input id="file_path" type="text" name="file_path" value="{{ old('file_path', $asset->file_path) }}" placeholder="optional" />
            </div>
            <div>
                <label for="object">{{ __('Objekt') }}</label>
                <input id="object" type="text" name="object" value="{{ old('object', $asset->object) }}" placeholder="optional" />
            </div>

            <div>
                <label for="type">{{ __('Typ') }}</label>
                <select id="type" name="type" size="1" required>
                    @if (!old('type', $asset->type))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('type', $asset->type) == "3d")
                        <option value="3d" selected>{{ __('3D Asset') }}</option>
                    @else
                        <option value="3d">{{ __('3D Asset') }}</option>
                    @endif
                    @if (old('type', $asset->type) == "2d")
                        <option value="2d" selected>{{ __('2D Image') }}</option>
                    @else
                        <option value="2d">{{ __('2D Image') }}</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="visible">{{ __('Sichtbar') }}</label>
                <select id="visible" name="visible"" size="1" required>
                    @if (!old('visible"', $asset->is_event))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('is_event', $asset->is_event) == 0)
                        <option value="1" selected>{{ __('Event') }}</option>
                    @else
                        <option value="1">{{ __('Event') }}</option>
                    @endif
                    @if (old('is_event', $asset->is_event) == 1)
                        <option value="0" selected>{{ __('asset') }}</option>
                    @else
                        <option value="0">{{ __('asset') }}</option>
                    @endif
                </select>
            </div>
            <div style="margin: 20px;">
                <button>{{ __('Save') }}</button>
                <a value="cancel" href="{{ route('assets.index') }}">
                    <button>{{ __('Cancel') }}</button>
                </a>
            </div>
        </div>
    </form>
</x-app-layout>
