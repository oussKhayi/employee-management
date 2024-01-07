<!DOCTYPE html>
<html>
   <head>
      <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
   </head>
   <body>
      <x-admin-dashboard title="Groups Calendar">
        <p class="w-full bg-gray-200 rounded-lg my-1 px-2 py-1 text-sm">Click on a date to display groups by day</p>
         @if (session('success'))
         <div id="success-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
            <strong class="font-bold">success : </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span id="close-success" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
               <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
         @if (session('error'))
         <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
            <strong class="font-bold">error : </strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span id="close-error" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
               <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Close</title>
                  <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
               </svg>
            </span>
         </div>
         <script>
            document.getElementById('close-error').addEventListener('click', function () {
                document.getElementById('error-alert').style.display = 'none';
            });
         </script>
         @endif
         <div id='calendar'></div>
      </x-admin-dashboard>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
           var calendarEl = document.getElementById('calendar');
         
           var calendar = new FullCalendar.Calendar(calendarEl, {
             selectable: true,
             headerToolbar: {
               left: 'prev,next today',
               center: 'title',
               right: 'dayGridMonth,timeGridWeek,timeGridDay'
             },
             // dateClick: function(info) {
             //   alert('clicked ' + info.dateStr);
             // }
             dateClick: function(info) {
           // Generate a URL with the chosen date as a parameter
           const url = `/groups/show-for-date/${info.dateStr}`;
         
           // Submit the form using POST
           const form = document.createElement('form');
           form.method = 'POST';
           form.action = url;
           form.style.display = 'none'; // Hide the form for better UI
         
           // Add a hidden input field with the date
           const input = document.createElement('input');
           input.type = 'hidden';
           input.name = 'date';
           input.value = info.dateStr;
           form.appendChild(input);
         
           // Add the CSRF token
           const csrfInput = document.createElement('input');
           csrfInput.type = 'hidden';
           csrfInput.name = '_token';
           csrfInput.value = '{{ csrf_token() }}'; // Inject the Blade-generated token
           form.appendChild(csrfInput);
         
           // Submit the form
           document.body.appendChild(form);
           form.submit();
         }
           });
         
           calendar.render();
         });
         
             
      </script>
   </body>
</html>