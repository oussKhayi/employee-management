<x-admin-dashboard title="employees Attendance">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   -800 focus:ring-2  ">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    Full name
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    CIN
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    Present
                </th>
                <th scope="col" class="px-6 py-3">
                    Half time
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    day and night
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
    <form action="{{ route('attendance.store') }}" method="post">
        @method('POST')
        @csrf       
        <tr class="bg-white border-b hover:bg-gray-50" id="{{ $employee->id }}">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                {{ $employee->last_name }} {{ $employee->first_name }}
            </th>
            <td class="px-6 py-4">
                <select class="border rounded" name="is_present">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <select class="border rounded" name="half_time">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
            </td>
            <td class="px-6 py-4">
                <input type="date" class="border rounded" name="attendance_date" />
            </td>
            <td class="px-6 py-4">
                <select class="border rounded" name="day_and_night">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
            </td>
            <td class="flex items-center px-6 py-4">
                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500">Validate</button>
            </td>
        </tr>
    </form>
@endforeach

            {{-- @foreach ($employees as $employee)
                    <form action="{{route('attendance.store')}}" method="post">
                        @method('POST')
                    @csrf       
                    <tr class="bg-white border-b   hover:bg-gray-50 " id="{{$employee->id}}"> --}}
                        {{-- <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500   -800 focus:ring-2  ">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td> --}}
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                            <input type="text" name="employee_id" hidden value="{{$employee->id}}">
                            {{$employee->last_name}} {{$employee->first_name}}
                        </th> --}}
                        {{-- <td class="px-6 py-4">
                            {{$employee->cin}}
                        </td> --}}
                        {{-- <td class="px-6 py-4"> --}}
                            {{-- <select name="isPresent" id="" class="uppercase">
                                <option class="capitalize" value="yes">yes</option>
                                <option class="capitalize" value="no">no</option>
                            </select> --}}
                            {{-- <select class="border rounded" name="is_present">
                                <option value="true" selected>Yes</option>
                                <option value="false">No</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <select class="border rounded" name="half_time">
                                <option value="true">Yes</option>
                                <option value="false" selected>No</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="date" class="border rounded" name="attendance_date"/>
                        </td>
                        <td class="px-6 py-4">
                            <select class="border rounded" name="day_and_night">
                                <option value="true">Yes</option>
                                <option value="false" selected>No</option>
                            </select>
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500">Validate</button> --}}
                            {{-- <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a> --}}
                        {{-- </td>
                    </tr>
                </form>
            @endforeach --}}
        </tbody>
    </table>
</div>

</x-admin-dashboard>