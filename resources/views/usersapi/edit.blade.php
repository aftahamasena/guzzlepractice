<img src="{{ $user['avatar'] }}" alt="{{ $user['avatar'] }}" style="max-width:20rem;">
<p>Data User {{ $user['id'] }} <br>Name : {{ $user['name'] }} <br>Phone : {{ $user['phone'] }} <br>Address :
    {{ $user['address'] }}</p>

<form action="{{ route('userapi.update', $user['id']) }}" method="POST">
    @csrf
    name : <input type="text" name="name" value="{{ $user['name'] }}">
    avatar : <input type="text" name="avatar" value="{{ $user['avatar'] }}">
    phone : <input type="number" name="phone" value="{{ $user['phone'] }}">
    address : <input type="text" name="address" value="{{ $user['address'] }}">
    <button type="submit">Save</button>
    <button type="reset">Reset</button>
</form>
