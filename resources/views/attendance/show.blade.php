<x-layout>
    <!-- In your employee details view (employee.show.blade.php) -->
<h1>{{ $emp->first_name }} {{ $emp->last_name }}</h1>

<!-- Display other employee details as needed -->

@if ($attendance)
    <h2>Attendance Details</h2>
    <p>Attendance Date: {{ $attendance->attendance_date }}</p>
    <p>Is Present: {{ $attendance->is_present ? 'Yes' : 'No' }}</p>
    <p>Half Time: {{ $attendance->half_time ? 'Yes' : 'No' }}</p>
    <p>Day and Night: {{ $attendance->day_and_night ? 'Yes' : 'No' }}</p>
@else
    <p>No attendance record found for today.</p>
    <!-- You can add a form to record attendance here -->
    <form action="{{ route('attendance.store', $emp->id) }}" method="post">
        @csrf
        <input type="hidden" name="is_present" value="1">
        <input type="hidden" name="half_time" value="0">
        <input type="hidden" name="day_and_night" value="0">
        <button type="submit">Record Attendance</button>
    </form>
@endif

<!-- Add other content as needed -->

</x-layout>