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
        <div>
            name: {{$user->name}} - role: {{$user->role->name}}
            <a href="{{route('users.edit',$user->id)}}">edit</a>
        </div>
    @endforeach
</body>
</html>