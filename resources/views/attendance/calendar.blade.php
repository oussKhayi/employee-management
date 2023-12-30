    <!DOCTYPE html>
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        <script>

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'multiMonthYear',
            firstDay: 1, // Monday
            events: @json($attendanceArray),
            })
            calendar.render()
        })

        </script>
    </head>
    <body>
    <x-admin-dashboard title="Employee Attendance">

        <div id='calendar'></div>
    </x-admin-dashboard>
    </body>
    </html>