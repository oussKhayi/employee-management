<x-admin-dashboard :employee="$employees" title="Employee table">
    <div class="relative w-full overflow-auto">
      @if (session('delete'))
    <div id="delete-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert">
        <strong class="font-bold">Done</strong>
        <span class="block sm:inline">{{ session('delete') }}</span>

        <span id="close-delete" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </span>
    </div>

    <script>
        document.getElementById('close-delete').addEventListener('click', function () {
            document.getElementById('delete-alert').style.display = 'none';
        });
    </script>
@endif

  @if (session('error'))
  <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
      <strong class="font-bold">Error : </strong>
      <span class="block sm:inline">{{ session('error') }}</span>

      <span id="close-error" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <title>Close</title>
              <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
          </svg>
      </span>
  </div>

  <script>
      document.getElementById('close-error').addEventListener('click', function () {
          document.getElementById('error-alert').style.display = 'none';
      });
  </script>
@endif

  
<form class="mb-4" action="{{route('employee.search')}}" method="POST">@csrf   
  <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
  <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
      </div>
      <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 uppercase placeholder:text-gray-400" name="search_term" placeholder="SH012345" required>
      <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
  </div>
</form>

  {{ $employees->links() }}
        <table class="w-full caption-bottom text-sm">
          <thead class="[&amp;_tr]:border-b">
            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[100px]">
                CIN
              </th>
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 min-w-[150px]">
               Full name
              </th>
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                Working time
              </th>
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                Tel
              </th>
              <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="[&amp;_tr:last-child]:border-0">
            @foreach ($employees as $emp)
              
            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
              <td class="uppercase p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-semibold">{{$emp->id}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$emp->last_name}} {{$emp->first_name}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">{{$emp->working_time}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">{{$emp->tel}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                <a href="{{route('employee.show',$emp->id)}}" class="border rounded-lg p-1 hover:bg-teal-400">Details</a>
                <a href="{{url('attendance-emp', $emp->id)}}" class="border rounded-lg p-1 hover:bg-orange-400">Abs</a>
                <a href="{{url("employee/$emp->id/payment")}}" class="border rounded-lg p-1 hover:bg-sky-400">Payment</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          
        </table>
      </div>
    </div>
    
    {{-- <div class="mt-4">
      {{ $employees->links('vendor.pagination.tailwind') }}
  </div> --}}
</x-admin-dashboard>