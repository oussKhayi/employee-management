<x-layout>
    {{-- <x-insert-employee/> --}}
    <!--
   // v0 by Vercel.
   // https://v0.dev/t/j18JFw3LdBM
   -->
   <div class="container bg-gray-50 mx-auto flex justify-center">

   
<main class="p-4 md:p-6 lg:p-8">
    <section class="mb-8">
       <div class="text-center py-6 px-4 bg-blue-500 text-white rounded-lg">
          <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold">Welcome to the Employee Management System!</h1>
       </div>
    </section>
    <section class="mb-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
       <div class="p-4 bg-white shadow rounded-lg">
          <h2 class="text-lg font-semibold">Total Employees</h2>
          <p class="text-2xl font-bold">500</p>
       </div>
       <div class="p-4 bg-white shadow rounded-lg">
          <h2 class="text-lg font-semibold">Active Employees</h2>
          <p class="text-2xl font-bold">450</p>
       </div>
       <div class="p-4 bg-white shadow rounded-lg">
          <h2 class="text-lg font-semibold">On-Leave Employees</h2>
          <p class="text-2xl font-bold">50</p>
       </div>
    </section>
    <section class="mb-8">
       <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <div class="p-4 bg-white shadow rounded-lg">
             <h3 class="text-lg font-semibold">New Employee</h3>
             <p class="text-sm">John Doe joined the Sales department.</p>
          </div>
          <div class="p-4 bg-white shadow rounded-lg">
             <h3 class="text-lg font-semibold">Promotion</h3>
             <p class="text-sm">Jane Smith was promoted to Senior Developer.</p>
          </div>
          <div class="p-4 bg-white shadow rounded-lg">
             <h3 class="text-lg font-semibold">Leave</h3>
             <p class="text-sm">Robert Johnson is on sick leave.</p>
          </div>
       </div>
    </section>
    <section class="mb-8">
       <h2 class="text-xl font-semibold mb-4">Employee Directory</h2>
       <div class="mb-4"><input placeholder="Search employees..." class="w-full p-2 border rounded-lg" type="text"></div>
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div class="p-4 bg-white shadow rounded-lg flex items-center">
             <img src="/placeholder.svg" alt="Employee" class="h-16 w-16 rounded-full mr-4">
             <div>
                <h3 class="text-lg font-semibold">John Doe</h3>
                <p class="text-sm">Sales</p>
             </div>
          </div>
       </div>
    </section>
    <section class="mb-8">
       <h2 class="text-xl font-semibold mb-4">Quick Links</h2>
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"><button class="p-4 bg-blue-500 text-white rounded-lg">Add New Employee</button><button class="p-4 bg-blue-500 text-white rounded-lg">Generate Reports</button><button class="p-4 bg-blue-500 text-white rounded-lg">Manage Departments</button></div>
    </section>
 </main>
    {{-- <livewire:counter/> --}}
</div>
</x-layout>