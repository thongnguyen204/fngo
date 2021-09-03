@extends('layouts.admin')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
</head>
<body>
    <h1>Rooms</h1>
    <a href="{{route('room.create',$rooms->first())}}">Add room</a>
    <table>
        <tr>
            <th >Room number</th>
            <th>Status</th>
            <th>Type</th>
            <th>Max person</th>
            <th></th>
        </tr>
    @foreach ($rooms as $room)
    <tr>
        <td>{{$room->room_number}}</td>
        <td>@if ($room->available == 1)
            online
        @else
            offline
        @endif</td>
        <td>{{$room->type->name}}</td>
        <td>{{$room->type->max_person}}</td>
        <td><a href="{{route('room.edit',$room)}}">edit</a></td>
        <td>
            <form action="{{route('room.destroy',$room->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
    </table>
    {{ $rooms->links() }}
    <a href="{{route('hotel.index')}}">Back to hotels</a>
</body>
</html>
@endsection