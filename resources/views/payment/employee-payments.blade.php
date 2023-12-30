<!--
   // v0 by Vercel.
   // https://v0.dev/t/5l5cfRh23g8
   -->
   <x-admin-dashboard>
   <main class="flex flex-col items-center justify-center min-h-screen py-2 bg-gray-100">
    <div class="flex flex-col w-full max-w-2xl p-4 bg-white rounded-md shadow-lg">
       <div class="flex items-center justify-between mb-4">
          <h2 class="text-2xl font-bold">
             Employee Payment Dashboard
          </h2>
          <span class="relative flex shrink-0 overflow-hidden rounded-full w-10 h-10" src="/placeholder.svg?height=100&amp;width=100">
          </span>
       </div>
       <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-bold">
             Employee Information
          </h3>
          <div class="grid gap-0.5 text-xs">
             <div class="font-medium">First Name: {{$employee->first_name}}</div>
             <div class="font-medium">Last Name: {{$employee->last_name}}</div>
             <div class="font-medium">CIN: {{$employee->cin}}</div>
          </div>
       </div>
       <div class="grid grid-cols-1 gap-4">
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm flex" data-v0-t="card">
             <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="tracking-tight text-xl font-bold">
                   Total Rent Balance : {{$totalPayment}} DH
                </h3>
                <h3 class="tracking-tight text-xl font-bold text-green-500">
                   Total Taken Rent : {{$takenPayments}} DH
                </h3>
                <h3 class="tracking-tight text-xl font-bold text-red-500">
                   Current Rent Balance : {{$totalPayment-$takenPayments}} DH
                </h3>
             </div>
             <div class="p-3 ms-20 relative w-[30%] flex items-center">
               <a href="{{url("employees/$employee->id/pay")}}" class="border-2 p-3 px-4 mx-auto rounded-lg bg-gray-900 text-white font-semibold">
                  New Payment
               </a>
             </div>
          </div>
          <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
             <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="tracking-tight text-xl font-bold">
                   Payment History
                </h3>
             </div>
             <div class="p-2">
                {{-- <div class="relative">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-2.5 top-2.5 h-4 w-4 text-gray-500 dark:text-gray-400">
                      <circle cx="11" cy="11" r="8">
                      </circle>
                      <path d="m21 21-4.3-4.3">
                      </path>
                   </svg>
                   <input class="flex h-10 rounded-md border border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full bg-white shadow-none appearance-none pl-8" placeholder="Search" type="search">
                </div> --}}
                <div class="relative w-full overflow-auto">
                   <table class="w-full caption-bottom text-sm">
                      <thead class="[&amp;_tr]:border-b">
                         <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                               Date
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                               Amount
                            </th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                               Status
                            </th>
                         </tr>
                      </thead>
                      <tbody class="[&amp;_tr:last-child]:border-0">
                        @foreach (json_decode($employee->rent_taken, true) as $ele)
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                            {{-- {{$rent->rent}} --}}
                            {{$ele["date"]}}
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                               {{$ele["rent"]}} DH
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                               <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 w-fit text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">
                                  Paid
                               </div>
                            </td>
                         </tr>
                     
                         @endforeach
                         <tr class="border-zinc-400 border-t-2">
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">
                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 w-fit font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">Total</div>
                            </td>
                            <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$takenPayments}} DH</td>
                            <td></td>
                         </tr>
                    </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </main>
</x-admin-dashboard>