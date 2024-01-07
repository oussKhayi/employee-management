<x-admin-dashboard title="Make a payment for {{$employee->cin}}">
<form method="post" action="{{ route('employees.pay', ['employee' => $employee->id]) }}">
    @csrf
    <div class="flex justify-around w-[60%] ms-0 p-0">
        <h1 class="text-xl p-2 ps-0 capitalize">CIN : {{$employee->cin}}</h1>
        <h1 class="text-xl p-2  capitalize">Full name : {{$employee->last_name}} {{$employee->first_name}}</h1>
    </div>
    <div class="flex flex-col space-y-1.5 p-6">
        <h3 class="tracking-tight text-xl font-bold">
          Total Rent Due : {{$totalPayment}} DH
        </h3>
        <h3 class="tracking-tight text-xl font-bold text-green-500">
          Rent Paid : {{$rentPaid}} DH
        </h3>
        <h3 class="tracking-tight text-xl font-bold text-red-500">
          Outstanding Balance : {{$totalPayment-$rentPaid}} DH
        </h3>
     </div>
    <label for="rent">Rent Amount:</label>
    <input type="number" name="rent" id="rent" step="10" max="{{$totalPayment-$rentPaid}}" required>

    <button type="submit" class="p-2 px-5 bg-cyan-300 font-semibold">Submit Payment</button>
</form>
</x-admin-dashboard>