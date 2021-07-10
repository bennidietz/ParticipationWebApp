<tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
    <td class="px-4 py-4">{{ $suggestion->title ?? "-"}}</td>
    <td class="px-4 py-4">{{ $suggestion->description ?? "-" }}</td>
    <td class="px-4 py-4">{{ $suggestion->latitude ?? "-"}}</td>
    <td class="px-4 py-4">{{ $suggestion->longitude ?? "-" }}</td>
    <td class="px-4 py-4">{{ $suggestion->geojson ?? "-" }}</td>
    <td class="px-4 py-4">{{ $suggestion->asset_id ?? "-"}}</td>
    <td class="px-4 py-4">{{ $suggestion->user_id ?? "-" }}</td>
    <td class="px-4 py-4">
        <a href="{{ route('suggestions.show', $suggestion) }}">
            <button>{{ __('View') }}</button>
        </a>
    </td>
</tr>
