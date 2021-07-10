<tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
    <td class="px-4 py-4">{{ $asset->name }}</td>
    <td class="px-4 py-4">{{ $asset->type ?? "-" }}</td>
    <td class="px-4 py-4">{{ $asset->object ?? "-"}}</td>
    <td class="px-4 py-4">{{ $asset->file_path ?? "-" }}</td>
    <td class="px-4 py-4">
        <a href="{{ route('assets.show', $asset) }}">
            <button>{{ __('View') }}</button>
        </a>
    </td>
</tr>
