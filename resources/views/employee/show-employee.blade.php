<x-admin-dashboard>
    <!--
// v0 by Vercel.
// https://v0.dev/t/M0vAO8Pkdqr
-->
<div class="w-full py-12 px-6 md:px-8 lg:px-10">
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
        <div class="p-2 pt-4">
            <a  href="{{ url()->previous() }}" class="px-3 py-2 bg-black rounded text-white mt-2"> Back</a>
        </div>
        <div class="flex flex-col space-y-1.5 p-6">
    <div class="flex items-center gap-4">
    <span class="relative flex shrink-0 overflow-hidden rounded-full h-24 w-24">
    <span class="flex h-full w-full items-center justify-center rounded-full bg-muted bg-gray-200  font-bold text-3xl">
        {{ strtoupper(substr($employee->last_name, 0,1)) }}{{ strtoupper(substr($employee->first_name, 0, 1)) }}</span>
    </span>
    <div>
    <p class="text-2xl font-bold">{{$employee->last_name}} {{$employee->first_name}}</p>
    <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 w-fit text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary-80">{{$employee->working_time}}</div>
    <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 w-fit text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary-80">{{$employee->created_at->format('Y-m-d')}}</div>
</div>
</div>
</div>
<div class="p-6">
    <div class="grid gap-2 text-sm">
    <p><strong>Contact Information:</strong></p>

    <div class="p-0 m-0 flex">CIN: <p class="ps-2 font-bold uppercase">{{$employee->cin}}</p></div>
    <p>Phone: {{$employee->tel}}</p>
    <p>Gender: {{$employee->gender}}</p>
    <p>Address: {{$employee->address}}</p>
</div>
<div class="mt-4">
    <p>
    <strong>About:</strong>
</p>
    <p class="text-gray-600 dark:text-gray-400">A brief bio about the employee goes here. This can include information about their role, their experience, and any other relevant details.</p>
</div>
</div>
<div class="flex justify-end p-4">
    <button
     class="bg-transparent hover:bg-gray-800 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Edit Details</button>

        <form 
            action="{{ route('employee.destroy', $employee->id) }}" 
            method="POST" 
            onsubmit="return confirm('Are you sure you want to delete this employee?')">
            @method('DELETE')

            @csrf
            
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded ms-6">
                Delete Employee
            </button>
        </form>
        
         
         
         <script>
        //      function confirmDelete(employeeId) {
        //          if (window.confirm('Are you sure with that?')) {
        //              window.location.href = '{{ route('employee.destroy', ['employee' => '__employee_id__']) }}'.replace('__employee_id__', employeeId);
        //          }
        //      }
        //  </script>
    {{-- <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 mr-2">Edit Details</button> --}}
    {{-- <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">Delete Employee</button> --}}
</div>
</div>
</div>
</x-admin-dashboard>