<x-admin-dashboard title="Add New Employee">
    <form action="{{route('employee.store')}}" method="post"
    class="p-0 m-0">
    @csrf
<div class="mx-auto max-w-2xl p-4 space-y-6">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Done</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
@endif
    {{-- <h1 class="text-3xl font-bold text-center">Add New Employee</h1> --}}
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm space-y-4 p-2" data-v0-t="card">
    <div class="flex flex-col space-y-1.5 p-1">
    <div class="flex items-center space-x-2">
    <span class="relative flex shrink-0 overflow-hidden rounded-full w-10 h-10" src="/placeholder.svg?height=50&amp;width=50">
</span>
    <div class="font-semibold text-lg">Employee Details</div>
</div>
</div>
<div class="p-6 pt-2">
    <div class="grid grid-cols-2 gap-4">
    <div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="fName">First name</label>
    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="first_name" id="fName" placeholder="Enter employee's name" required>
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="lName">Last name</label>
    <input class="uppercase flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="last_name" id="lName" placeholder="Enter employee's last name" required type="text">
    @error('first_name')
    <span class="text-red-500">{{ $message }}</span>
@enderror
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="cin">CIN</label>
    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="cin" id="cin" placeholder="Enter employee's CIN" required>
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="phone-number">Phone Number</label>
    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="tel" id="phone-number" placeholder="Enter employee's phone number" required>
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="address">Address</label>
    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="address" id="address" placeholder="Enter employee's address" required>
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="birth">Date of Birth</label>
    <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="birth_date" id="birth" placeholder="Enter employee's date of birth" required="" type="date">
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="gender">Gender</label>
    <select class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="gender" id="gender">
        <option value="male">male</option>
        <option value="female">female</option>
    </select>
</div>
<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="wTime">Working part</label>
    <select class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" name="working_time" id="wTime">
        <option value="morning">morning</option>
        <option value="night">night</option>
    </select>
    
</div>

<div class="space-y-2">
    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="daily_rent">Daily rent by DH</label>
    <input type="number" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" min="0" name="daily_rent" id="daily_rent" placeholder="Daily rent, ex : 100,00" required>
</div>

</div>
</div>
{{-- <div class="flex justify-end mt-4"> --}}
    {{-- </div> --}}
    <button class="w-[60%] ms-[20%] inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-primary/90 h-10 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white" type="submit">Add Employee</button>
</div>
</div>
</form>
</x-admin-dashboard>