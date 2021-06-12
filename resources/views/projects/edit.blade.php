<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->id ? __('Edit contact') : __('Create contact') }}
        </h2>
    </x-slot>

    <form action="{{ $project->id ? route('projects.update', $project) : route('projects.store') }}" method="POST">
        @csrf
        @if ($project->id)
            @method('PUT')
        @endif
        <div>
            <label for="title">{{ __('Name') }}</label>
            <input id="title" type="text" name="title" value="{{ old('name', $project->name) }}" placeholder="optional" />
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
                    <option value="Ja" selected>{{ __('Ja') }}</option>
                @else
                    <option value="Ja">{{ __('Ja') }}</option>
                @endif
                @if (old('visible', $project->visible) == 1)
                    <option value="Nein" selected>{{ __('Nein') }}</option>
                @else
                    <option value="Nein">{{ __('Nein') }}</option>
                @endif
            </select>
        </div>
        <div>
            <label for="visible">{{ __('Typ') }}</label>
            <select id="is_event" name="is_event" size="1" required>
                @if (!old('is_event', $project->is_event))
                    <option value="" disabled selected>{{ __('Please select') }}</option>
                @else
                    <option value="" disabled>{{ __('Please select') }}</option>
                @endif
                @if (old('is_event', $project->is_event) == 0)
                    <option value="Event" selected>{{ __('Event') }}</option>
                @else
                    <option value="Event">{{ __('Event') }}</option>
                @endif
                @if (old('is_event', $project->is_event) == 1)
                    <option value="Project" selected>{{ __('Project') }}</option>
                @else
                    <option value="Project">{{ __('Project') }}</option>
                @endif
            </select>
        </div>
        <div>
            <label for="contact-preference">{{ __('Contact preference') }}</label>
            <select id="contact-preference" name="contact_preference" size="1">
                @if (!old('contact_preference', $project->contact_preference))
                    <option value="" selected>{{ __('no preference') }}</option>
                @else
                    <option value="">{{ __('no preference') }}</option>
                @endif
                @if (old('contact_preference', $project->contact_preference) == 'phone')
                    <option value="phone" selected>{{ __('Phone') }}</option>
                @else
                    <option value="phone">{{ __('Phone') }}</option>
                @endif
                @if (old('contact_preference', $project->contact_preference) == 'email')
                    <option value="email" selected>{{ __('Email') }}</option>
                @else
                    <option value="email">{{ __('Email') }}</option>
                @endif
            </select>
        </div>
        <div>
            <button>{{ __('Save') }}</button>
        </div>
    </form>
    <a href="{{ route('projects.index') }}">
        <button>{{ __('Cancel') }}</button>
    </a>
</x-app-layout>
