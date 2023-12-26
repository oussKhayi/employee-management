<div>
    <link rel="stylesheet" href="{{ asset('css/fullcalendar/core/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar/daygrid/main.css') }}" />

    <div wire:ignore id="calendar"></div>

    @push('scripts')
        {{-- <script src="{{ asset('js/fullcalendar/core/main.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/fullcalendar/daygrid/main.js') }}"></script> --}}
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

        <script>
            document.addEventListener('livewire:load', function () {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['dayGrid'],
                    events: @json($events),
                });

                calendar.render();
            });
        </script>
    @endpush
</div>
