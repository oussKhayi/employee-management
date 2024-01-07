<nav class="bg-white shadow">
    <div class="container px-6 py-4 mx-auto flex items-center justify-between">
        <a href="/analytics">
            <h1 class="text-2xl font-bold uppercase">Employee S.M</h1>
        </a>

        
        <div class="flex items-center">
            <div class="flex space-x-4">
                <a href="/analytics" class="text-gray-700 hover:text-gray-600">Dashboard</a>
                <!-- Add more navigation links as needed -->
            </div>
            {{-- <button @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                </svg>
            </button> --}}

            <button class="mx-4 text-gray-600 hover:text-gray-700 focus:text-gray-700 focus:outline-none" aria-label="show notifications">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <a href="/user/profile" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                </div>
                {{-- <h3 class="mx-2 text-gray-700">Khatab wedaa</h3> --}}
            </a>
        </div>
    </div>
</nav>
