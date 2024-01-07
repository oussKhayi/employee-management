<x-admin-dashboard title="Groups on Date">
    <div id='calendar'></div>
  
    @if (session('groups'))
      <div class="mt-4">
        <h2>Groups for {{ session('date') }}:</h2>
        </div>
    @endif
  </x-admin-dashboard>