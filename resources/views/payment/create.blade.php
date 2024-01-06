<x-admin-dashboard title="Make a payment">
<form method="post" action="{{ route('employees.pay', ['employee' => $employee->id]) }}">
    @csrf
    <h1 class="text-2xl p-2 ">{{$employee->first_name}}</h1>
    <h1 class="text-2xl p-2 ">{{$payment}}</h1>
    <label for="rent">Rent Amount:</label>
    <input type="number" name="rent" id="rent" step="10" max="{{$payment}}" required>

    <button type="submit" class="p-2 px-5 bg-cyan-300 font-semibold">Submit Payment</button>
</form>
</x-admin-dashboard>