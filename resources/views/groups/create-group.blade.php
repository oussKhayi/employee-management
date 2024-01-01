{{-- <form method="POST" action="{{ route('groups.store') }}">
    @csrf

    <label for="type">Group Type:</label>
    <input type="text" id="type" name="type" required>

    <label for="pack_count">Pack Count:</label>
    <input type="number" id="pack_count" name="pack_count" required>

    <button type="submit">Create Group</button>
</form> --}}
<x-admin-dashboard title="Working Groups">
    <!--
   // v0 by Vercel.
   // https://v0.dev/t/WyXRDLUae2I
   -->
<main class="container mx-auto p-6 grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @for ($i=0;$i<=5;$i++)    
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
       <div class="flex justify-around space-y-1.5 p-6">
          <h3 class="text-2xl font-bold tracking-tighter">Air rag 200g</h3> <button class="font-bold rounded-full bg-gray-800 text-center text-white w-[18px] h-[18px]">X</button>
       </div>
       <div class="p-6 py-4 border-t border-b">
          <div class="flex justify-between items-center">
             <span class="font-medium">KHAYI oussama</span>
             <button class="font-extrabold rounded-full bg-red-500 text-center text-white w-[18px] h-[18px]">-</button>
          </div>
          <div class="flex justify-between items-center">
             <span class="font-medium">Jane Doe</span>
             <button class="font-extrabold rounded-full bg-red-500 text-center text-white w-[18px] h-[18px]">-</button>
          </div>
          <div class="flex justify-between items-center">
             <span class="font-medium">Michael Johnson</span>
             <button class="font-extrabold rounded-full bg-red-500 text-center text-white w-[18px] h-[18px]">-</button>
          </div>
       </div>
       <div class="items-center py-4 flex">
          {{-- <div class="flex justify-between items-center"> --}}
             <span class="font-medium bg-gray-100 mx-auto">Packs Count: 87</span>
             {{-- </div> --}}
            </div>
            <div class="flex gap-2 p-2">
                <button class="bg-gray-800 text-white inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Add Member</button>
                <button class="border-2 border-gray-700 inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Edit</button>
            </div>
    </div>
    @endfor
 </main>
</x-admin-dashboard>