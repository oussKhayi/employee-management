<x-admin-dashboard title="Add Employees to Group: {{ $group->title }}">
    {{-- <h1>Add Employees to Group</h1> --}}

    {{-- <form method="post" action="{{ url('groups/{{$group->id}}/attach-employees', ['group' => $group->id]) }}"> --}}
    {{-- <form method="post" action="{{url('groups/{{$group->id}}/attach-employees',['group'=>$group->id])}}" class="bg-sky-200 p-4 rounded"> --}}
        {{-- <form method="post" action="{{ url('groups', [5, 'attach-employees']) }}" class="bg-sky-200 p-4 rounded"> --}}
        {{-- <form method="post" action="{{route('group.attach_employees')}}" class="bg-sky-200 p-4 rounded">
            @csrf
            <label for="employees">Select Employees:</label>
            <h1>{{$group->type}}</h1>
            <input type="hidden" name="id" value="{{$group->id}}">
        <select name="employeess" id="employees" multiple>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
            @endforeach
        </select>

        <button type="submit">Add Employees</button>
    </form> --}}


<form action="{{ route('groups.attachEmployeesToGroup', $group) }}" method="post">
    @csrf
    <h1 class="text-2xl font-semibold capitalize">group {{ $group->id }} : {{ $group->type }}</h1>
    <div class="form-group">
        <label for="employees">Select Employees:</label>
        @foreach ($employees as $employee)
        <div class="custom-control custom-checkbox"> 
                <input type="checkbox" class="custom-control-input" id="employee{{ $employee->id }}" name="employee_ids[]" value="{{ $employee->id }}">
                <label class="custom-control-label" for="employee{{ $employee->id }}">{{ $employee->last_name }} {{ $employee->first_name }}</label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="daily_rent">Number of Boxes (Optional):</label>
        <input type="number" class="form-control" id="daily_rent" name="daily_rent" min="0" value="{{ old('daily_rent', 0) }}">
    </div>

    <button type="submit" class="px-3 py-2 bg-cyan-400 font-semibold rounded">Add Employees</button>
</form>
</x-admin-dashboard>