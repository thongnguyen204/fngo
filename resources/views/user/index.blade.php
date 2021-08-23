<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
    <h1>users</h1>
    @foreach ($users as $user)
        <div style="margin-bottom: 10px">
            name: {{$user->name}} - role: {{$user->role->name}}
            <a href="{{route('user.edit',$user->id)}}">edit</a>
            <form style="" action="{{route('user.destroy',$user->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </div>
        
    @endforeach
</body>
</html>