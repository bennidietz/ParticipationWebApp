<tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
    <td class="px-4 py-4">{{ $project->name }}</td>
    <td class="px-4 py-4">{{ $project->description }}</td>
    <td class="px-4 py-4">{{ $project->content ?? "-"}}</td>
    <td class="px-4 py-4">{{ $project->visible ? "Ja" : "Nein" }}</td>
    <td class="px-4 py-4">{{ $project->is_event ? "Event" : "Projekt" }}</td>
    <td class="px-4 py-4">{{ $project->start_time }}</td>
    <td class="px-4 py-4">{{ $project->end_time }}</td>
    <td class="px-4 py-4">
        <a href="{{ route('projects.show', $project) }}">
            <button>{{ __('View') }}</button>
        </a>
    </td>
</tr>
