<form method="POST" action="{{route('greeting_post')}}">
    @csrf
    <label for="name">Tên</label>
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>
