<!--
// v0 by Vercel.
// https://v0.dev/t/aaWVAfFQfGT
-->
<x-layout>
<div class="container mx-auto">
  <div class="grid h-screen min-h-screen w-full lg:grid-cols-[280px_1fr]">
  <div class="hidden border-r bg-gray-100/40 lg:block">
      <div class="flex flex-col gap-2">
          <div class="flex h-[60px] items-center px-6">
              <a class="flex items-center gap-2 font-semibold" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                      <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  <span>Employee Management</span>
              </a>
          </div>
          <div class="flex-1">
              <nav class="grid items-start px-4 text-sm font-medium">
                  <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-500 hover:text-gray-900" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                          <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                          <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg>
                      Home
                  </a>
                  <a class="flex items-center gap-3 rounded-lg  @if(request()->is('employee'))
                    bg-gray-100 text-gray-900
                @endif px-3 py-2 text-gray-500  hover:text-gray-900" href="{{route('employee.index')}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                          <circle cx="9" cy="7" r="4"></circle>
                          <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      Employees
                      <div class="border px-2.5 py-0.5 text-xs font-semibold">
                          52
                      </div>
                  </a>
                  <a class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-500 hover:text-gray-900 @if(request()->is('employee.show')) text-gray-900
                    bg-gray-100
                @endif " href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                          <path d="M3 3v18h18"></path>
                          <path d="m19 9-5 5-4-4-3 3"></path>
                      </svg>
                      Analytics
                  </a>
                  <a href="{{route('employee.create')}}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-500 hover:text-gray-900 @if(request()->is('employee/create'))
                    bg-gray-100 text-gray-900
                @endif" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                      <path d="M17 3v18l-7-7-3 3" stroke-linecap="square" />
                      <path d="M12 18h8" stroke-linecap="square" />
                      <path d="M4 21h3" stroke-linecap="square" />
                      <path d="M1 17h3" stroke-linecap="square" />
                    </svg>
                    
                      New Employee
                  </a>
              </nav>
          </div>
      </div>
  </div>
  <div class="flex flex-col">
      <header class="flex h-14 items-center gap-4 border-b bg-gray-100/40 px-6">
          <a class="lg:hidden" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
              <span class="sr-only">Home</span>
          </a>
          <div class="flex-1">
              <h1 class="font-semibold text-lg">Recent Employees</h1>
          </div>
      </header>
      <main class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
          <div class="border shadow-sm rounded-lg p-2">
              <!-- Main content -->
              {{$slot}}
      </main>
  </div>
</div>
</div>
</x-layout>