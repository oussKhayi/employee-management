<x-admin-dashboard title="employee information">
    <!--
// v0 by Vercel.
// https://v0.dev/t/M0vAO8Pkdqr
-->
<div class="w-full py-12 px-6 md:px-8 lg:px-10">
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
        {{-- <div class="p-2 pt-4">
            <a  href="{{ url()->previous() }}" class="px-3 py-2 bg-black rounded text-white mt-2"> Back</a>
        </div> --}}
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
    <p><strong>Employee Information:</strong></p>

    <div class="p-0 m-0 flex">CIN: <p class="ps-2 font-bold uppercase">{{$employee->cin}}</p></div>
    <p>Phone: {{$employee->tel}}</p>
    <p>Gender: {{$employee->gender}}</p>
    <p>CNSS: {{$employee->is_cnss?"Yes":"No"}}</p>
    <p>Daily rent: {{$employee->daily_rent}}DH</p>
    <p>Address: {{$employee->address}}</p>
    <p>Payment: {{$payment}} DH</p>
</div>
</div>
<div class="flex justify-end p-4">
    <button
     class="bg-transparent hover:bg-gray-800 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Edit Details</button>
    <a
    href="{{url("employee/$employee->id/payment")}}"
     class="bg-green-400 hover:bg-green-500 text-white font-semibold hover:text-white py-2 px-4 border rounded ms-4">
        Payment</a>

        <form 
            action="{{ route('employee.destroy', $employee->id) }}" 
            method="POST" 
            {{-- onsubmit="return confirm('Are you sure you want to delete this employee?')" --}}
            >
            @method('DELETE')

            @csrf
            
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded ms-6" id="show-alert">
                Delete Employee
            </button>
        </form>
        <a href="#" data-confirm-delete="true">Swal TEST</a>
</div>
</div>
</div>
</x-admin-dashboard>