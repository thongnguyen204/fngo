@extends('layouts.admin')

@section('content')



<body>
    <div class="container">
    <h1 class="text-center">{{$rooms->first()->hotel->name}}</h1>
    <a href="{{route('room.create',$rooms->first())}}">Add room</a>
    <table class="table">
        <tr>
            <th >Room number</th>
            <th>Status</th>
            <th>Type</th>
            <th>Max person</th>
            <th></th><th></th>
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
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
    </table>
    {{ $rooms->links() }}
    
    </div>
</body>
@endsection