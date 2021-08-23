<form action="{{route('user.update',$user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" 
        value="{{$user->name}}"/>
    </div>

    <div>
        <label for="email">Email: </label>
        <input type="text" name="email" 
        value="{{$user->email}}"/>
    </div>
    <div>
        <button type="submit">update</button>
    </div>
</form>