<h1>Guzzle cURL Test</h1>
<a href="{{ route('userapi.create') }}">| Add Data |</a>
<hr>
<form action="{{ route('userapi.index') }}" method="GET">
    <input type="text" name="search" placeholder="Cari nama ...." value="{{ request('search') }}">
    <button type="submit">Cari</button>
    <br>

    <!-- Sort By -->
    <select name="sort_by" onchange="this.form.submit()">
        <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Sort by ID</option>
        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Sort by Name</option>
    </select>

    <!-- Order -->
    <select name="order" onchange="this.form.submit()">
        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>
    <br>

    @if ($message)
        <p>{{ $message }}</p>
    @elseif (is_iterable($data))
        @foreach ($data as $user)
            <img src="{{ $user['avatar'] }}" alt="{{ $user['avatar'] }}" style="max-width:12rem;">
            <p>
                Data User {{ $user['id'] }} <br>
                Name: {{ $user['name'] }} <br>
            </p>
            <a href="{{ route('userapi.show', $user['id']) }}">| show |</a>
            <a href="{{ route('userapi.edit', $user['id']) }}">| edit |</a>
            <form action="{{ route('userapi.delete', $user['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus Data User Ini ?')">| Delete |</button>
            </form>
            <hr>
        @endforeach
    @endif
</form>
