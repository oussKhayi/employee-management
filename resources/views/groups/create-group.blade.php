<form method="POST" action="{{ route('groups.store') }}">
    @csrf

    <label for="type">Group Type:</label>
    <input type="text" id="type" name="type" required>

    <label for="pack_count">Pack Count:</label>
    <input type="number" id="pack_count" name="pack_count" required>

    <button type="submit">Create Group</button>
</form>