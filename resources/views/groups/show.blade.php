<x-layout>
    <h1>{{ $group->type }} Group</h1>

<ul>
    @foreach ($group->employees as $employee)
        <li>{{ $employee->name }}</li>
    @endforeach
</ul>

{{-- <a href="{{ route('group.addEmployee', $group) }}" class="p-3 mx-5 bg-rose-400">Add Employee</a> --}}
{{-- <a href="{{ route('group.removeEmployee', $group) }}" class="p-3 mx-5 bg-rose-400">Remove Employee</a> --}}
</x-layout>