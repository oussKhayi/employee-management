<x-admin-dashboard title="attendance list">
    <ul>

        @foreach ($attendanceData as $atd)
            <li>
                <p>Present : {{$atd->employee->first_name}} Present : @if ($atd->is_present==1)
                    True
                @else
                False
                @endif, Date : {{$atd->created_at}}</p>
            </li>
        @endforeach
    </ul>
    {{-- {{ $attendanceData->links() }} --}}
</x-admin-dashboard>