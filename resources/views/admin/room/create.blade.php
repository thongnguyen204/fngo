@extends('layouts.admin')

@section('content')

<body>
    <h1>Create room</h1>
    <form action="{{route('room.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="room_number">Room number: </label></td>
                <td><input type="text" name="room_number" 
                    /></td>
            </tr>
            <tr>
                <td><label for="hotel_id">Hotel: </label></td>
                <td>
                    {{$room->hotel->name}}
                    <input type="hidden" name="hotel_id" 
                    value="{{$room->hotel_id}}"
                    />
                </td>
            </tr>
            <tr>
                <td><label for="type_id">Type: </label></td>
                <td>
                    <select name="type_id" size="1">
                        @foreach ($types
                         as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                      </select>
                </td>
            </tr>
            <tr>
                <td><label for="description">Description: </label></td>
                {{-- <td><input type="text" name="description" 
                    value="{{$room->description}}"/></td> --}}
                    <td>
                        <textarea cols="30" rows="8" name="description" 
                        ></textarea>
                    </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Add</button></td>
            </tr>
        </table>
    </form>
</body>

@endsection