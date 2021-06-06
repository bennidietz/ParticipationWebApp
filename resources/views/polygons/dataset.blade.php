<tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
    <td class="px-4 py-4">{{ $polygon->name }}</td>
    <td class="px-4 py-4">{{ $polygon->geojson }}</td>
    <td class="px-4 py-4">{{ $polygon->state ?? "-"}}</td>
    <td class="px-4 py-4">{{ $polygon->description ?? "-" }}</td>
    <td class="px-4 py-4">
        <a href="{{ route('polygons.show', $polygon) }}">
            <button>{{ __('View') }}</button>
        </a>
    </td>
</tr>
