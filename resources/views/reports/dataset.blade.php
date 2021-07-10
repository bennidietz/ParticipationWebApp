<tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
    <td class="px-4 py-4">{{ $report->id }}</td>
    <td class="px-4 py-4">{{ $report->description }}</td>
    <td class="px-4 py-4">{{ $report->user_id ?? "-"}}</td>
    <td class="px-4 py-4">{{ $report->suggestion_id ?? "-"}}</td>
    <td class="px-4 py-4">{{ $report->asset_id ?? "-"}}</td>
    <td class="px-4 py-4">{{ $report->comment_id ?? "-"}}</td>
    <td class="px-4 py-4">
        <a href="{{ route('reports.show', $report) }}">
            <button>{{ __('View') }}</button>
        </a>
    </td>
</tr>
