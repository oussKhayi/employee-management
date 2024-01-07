<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>

</head>
<body>
  <x-admin-dashboard title="Working Groups">
    <!--
   // v0 by Vercel.
   // https://v0.dev/t/WyXRDLUae2I
   -->

   @if (session('success'))
    <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert">
        <strong class="font-bold">Done</strong>
        <span class="block sm:inline">{{ session('success') }}</span>

        <span id="close-success" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </span>
    </div>

    <script>
        document.getElementById('close-success').addEventListener('click', function () {
            document.getElementById('success-alert').style.display = 'none';
        });
    </script>
@endif
   <form method="POST" action="{{ route('groups.store') }}" class="ps-6 mb-3 bg-gray-200 p-3 rounded">
      @csrf
      <p class="font-semibold">New group :</p>
      <label for="type">Group Title:</label>
      <input class="rounded" type="text" id="type" name="type" required>
  
      <label for="pack_count">Pack Count:</label>
      <input class="rounded" type="number" id="pack_count" name="pack_count" required>
  
      <button type="submit" class="px-3 py-2 bg-sky-400 font-bold text-black rounded">Create Group</button>
   </form>

   <button class="px-3 py-2 bg-lime-400 font-bold text-black rounded w-full">Create Group +</button>

   <main class="container mx-auto p-6 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <script>
         document.addEventListener('DOMContentLoaded', function () {
           // Function to show the modal
           const showModal = (modalId) => {
             const modal = document.getElementById(modalId);
             modal.classList.remove('hidden');
             modal.setAttribute('aria-hidden', 'false');
             document.body.classList.add('overflow-hidden');
           };
       
           // Function to hide the modal
           const hideModal = (modalId) => {
             const modal = document.getElementById(modalId);
             modal.classList.add('hidden');
             modal.setAttribute('aria-hidden', 'true');
             document.body.classList.remove('overflow-hidden');
           };
       
           // Attach click event to toggle button
           const toggleButtons = document.querySelectorAll('[data-modal-toggle]');
           toggleButtons.forEach(button => {
             button.addEventListener('click', () => {
               const modalId = button.getAttribute('data-modal-toggle');
               showModal(modalId);
             });
           });
       
           // Attach click event to hide button
           const hideButtons = document.querySelectorAll('[data-modal-hide]');
           hideButtons.forEach(button => {
             button.addEventListener('click', () => {
               const modalId = button.getAttribute('data-modal-hide');
               hideModal(modalId);
             });
           });
         });
       </script>
     @foreach ($groups as $group)
        
     
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
       <div class="flex justify-around space-y-1.5 p-6">
          <h3 class="text-xl font-bold tracking-tighter">{{$group->type}}</h3>
          <form id="deleteForm_{{ $group->id }}" action="{{route('groups.destroy',['group'=>$group->id])}}" method="post">@method('delete')@csrf
            <button type="submit" onclick="confirmation(event, {{ $group->id }})" class="font-bold rounded-full bg-gray-800 text-center text-white w-[18px] h-[18px]">X</button>
         </form>
       </div>
       <div class="p-6 py-4 border-t border-b">
         @if ($group->employees)   
            @foreach ($group->employees as $employee)
            <div class="flex justify-between items-center">
               <span class="font-medium">{{$employee->first_name, $employee->last_name}}</span>
               <a href="{{ route('groups.remove-employee', [$group, $employee]) }}" class="font-extrabold rounded-full bg-red-500 text-center text-white w-[18px] h-[18px]">-</a>

            </div>
            @endforeach
         @else
            <span class="font-medium">no Employees yet!</span>
         @endif
       </div>
       <div class="items-center py-4 flex">
             <span class="font-medium bg-gray-100 mx-auto">Packs Count: {{$group->pack_count}}</span>
            </div>
            <div class="flex gap-2 p-2">
               <a href="{{ route('group.add_employees', ['group' => $group->id]) }}" class="bg-gray-800 text-white inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">add member</a>
                <!-- Modal toggle -->

         <button data-modal-target="authentication-modal-{{ $group->id }}" data-modal-toggle="authentication-modal-{{ $group->id }}" class="border-2 border-gray-700 inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2" type="button">
         Edit
         </button>
 
 <!-- Main modal -->
 <div id="authentication-modal-{{ $group->id }}" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-fit h-fit ms-12  md:inset-0 max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full shadow-lg">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow ">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                 <h3 class="text-xl font-semibold text-gray-900 ">
                     Update group information
                 </h3>
                 <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="authentication-modal-{{ $group->id }}">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4 md:p-5">
                 <form class="space-y-4" action="{{route('groups.update',['group'=>$group])}}" method="POST"> @csrf
                     <div>
                         <label for="type" class="block mb-2 text-sm font-medium text-gray-900 ">Group title</label>
                         <input type="text" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="{{$group->type}}" value="{{$group->type}}">
                     </div>
                     <div>
                         <label for="pack_count" class="block mb-2 text-sm font-medium text-gray-900 ">Number of Boxes</label>
                         <input type="number" name="pack_count" id="pack_count" placeholder="{{$group->pack_count}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required ="{{$group->pack_count}}">
                     </div>
                     <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                 </form>
             </div>
         </div>
     </div>
 </div> 
 
            </div>
            
    </div>
    @endforeach
    {{-- @endfor --}}
 </main>
</x-admin-dashboard>  
<script>
  function confirmation(event, groupId) {
      event.preventDefault();
      Swal.fire({
          title: "Are you sure?",
          text: "This group won't be available anymore!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
      }).then((result) => {
          if (result.isConfirmed) {
              // Submit the form with the corresponding group ID
              document.getElementById('deleteForm_' + groupId).submit();
          }
      });
  }
</script>
</body>
</html>
