@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<body>
    <h1>users</h1>
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
                <td><a href="{{route('users.edit',$user->id)}}">edit</a>
                </td>
                <td>
                    <form style="" action="{{route('users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</body>

@endsection