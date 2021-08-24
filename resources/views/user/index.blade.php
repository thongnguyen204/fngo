@extends('layouts.admin')

@section('content')
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
    {{-- @foreach ($users as $user)
        <div style="margin-bottom: 10px">
            name: {{$user->name}} - role: {{$user->role->name}}
            <a href="{{route('user.edit',$user->id)}}">edit</a>
            <form style="" action="{{route('user.destroy',$user->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach --}}
    <table>
        
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td><a href="{{route('user.edit',$user->id)}}">edit</a>
                </td>
                <td>
                    <form style="" action="{{route('user.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- <a href="{{route('admin')}}">Admin panel</a> --}}
</body>
</html>
@endsection