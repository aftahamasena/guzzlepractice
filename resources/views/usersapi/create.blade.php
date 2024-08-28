<form action="{{ route('userapi.store') }}" method="POST">
    @csrf
    name : <input type="text" name="name">
    avatar : <input type="text" name="avatar">
    phone : <input type="number" name="phone">
    address : <input type="text" name="address">
    <button type="submit">Save</button>
    <button type="reset">Reset</button>
</form>
