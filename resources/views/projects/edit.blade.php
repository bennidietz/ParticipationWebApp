<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->id ? __('Projekt bearbeiten') : __('Projekt erstellen') }}
        </h2>
    </x-slot>

    <form action="{{ $project->id ? route('projects.update', $project) : route('projects.store') }}" method="POST">
        @csrf
        @if ($project->id)
            @method('PUT')
        @endif
        <div style="width: 20%; margin: 0 auto; margin-top: 50px">
            <div>
                <label for="title">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name', $project->name) }}" placeholder="optional" />
            </div>
            <div>
                <label for="description">{{ __('Beschreibung') }}</label>
                <input id="description" type="text" name="description" value="{{ old('name', $project->description) }}" placeholder="optional" />
            </div>
            <div>
                <label for="content">{{ __('Inhalt') }}</label>
                <input id="content" type="text" name="content" value="{{ old('name', $project->content) }}" placeholder="optional" />
            </div>

            <div>
                <label for="visible">{{ __('Sichtbar') }}</label>
                <select id="visible" name="visible" size="1" required>
                    @if (!old('visible', $project->visible))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('visible', $project->visible) == 0)
                        <option value="1" selected>{{ __('Ja') }}</option>
                    @else
                        <option value="1">{{ __('Ja') }}</option>
                    @endif
                    @if (old('visible', $project->visible) == 1)
                        <option value="0" selected>{{ __('Nein') }}</option>
                    @else
                        <option value="0">{{ __('Nein') }}</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="is_event">{{ __('Typ') }}</label>
                <select id="is_event" name="is_event" size="1" required>
                    @if (!old('is_event', $project->is_event))
                        <option value="" disabled selected>{{ __('Please select') }}</option>
                    @else
                        <option value="" disabled>{{ __('Please select') }}</option>
                    @endif
                    @if (old('is_event', $project->is_event) == 0)
                        <option value="1" selected>{{ __('Event') }}</option>
                    @else
                        <option value="1">{{ __('Event') }}</option>
                    @endif
                    @if (old('is_event', $project->is_event) == 1)
                        <option value="0" selected>{{ __('Project') }}</option>
                    @else
                        <option value="0">{{ __('Project') }}</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="start">{{ __('Datum Beginn') }}</label>
                <input type="date" id="start" name="start_time"
                       value="<?php echo date('Y-m-d'); ?>"
                       value="<?php echo date('Y-m-d'); ?>" max="2022-12-31">
            </div>
            <div>
                <label for="end">{{ __('Datum Ende') }}</label>
                <input type="date" id="end" name="end_time"
                       value="<?php echo date('Y-m-d'); ?>"
                       value="<?php echo date('Y-m-d'); ?>" max="2022-12-31">
            </div>
            <div style="margin: 20px;">
                <button>{{ __('Save') }}</button>
                <a value="cancel" href="{{ route('projects.index') }}">
                    <button>{{ __('Cancel') }}</button>
                </a>
            </div>
        </div>
    </form>
</x-app-layout>
