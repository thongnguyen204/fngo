<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room edit</title>
</head>
<body>
    <h1>Edit room</h1>
    <form action="{{route('room.update',$room->id)}}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="room_number">Room number: </label></td>
                <td><input type="text" name="room_number" 
                    value="{{$room->room_number}}"/></td>
            </tr>
            <tr>
                <td><label for="hotel_id">Hotel: </label></td>
                <td>
                    <select name="hotel_id" size="1">
                        @foreach ($hotels as $hotel)
                            @if ($hotel->id == $room->hotel->id)
                            <option value="{{$hotel->id}}" selected>{{$hotel->name}}</option>
                            @else
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endif
                        @endforeach
                      </select>
                </td> 
            </tr>
            <tr>
                <td><label for="type">Type: </label></td>
                <td><input type="text" name="type" 
                    value="{{$room->type}}"/></td>
            </tr>
            <tr>
                <td><label for="max_person">Max person: </label></td>
                <td><input type="text" name="max_person" 
                    value="{{$room->max_person}}"/></td>
            </tr>
            <tr>
                <td><label for="price_per_night">Price per night: </label></td>
                <td><input type="text" name="price_per_night" 
                    value="{{$room->price_per_night}}"/></td>
            </tr>
            <tr>
                <td><label for="available">Available: </label></td>
                <td>
                    <select name="available" size="1">
                        <option value="1" @if ($room->available == 1)
                            {{"Selected"}}
                        @endif>Yes</option>
                        <option value="0" @if ($room->available == 0)
                            {{"Selected"}}
                        @endif>No</option>
                      </select>
                </td>
            </tr>
            <tr>
                <td><label for="description">Description: </label></td>
                {{-- <td><input type="text" name="description" 
                    value="{{$room->description}}"/></td> --}}
                    <td>
                        <textarea cols="30" rows="8" name="description" 
                        value="{{$room->description}}">{{$room->description}}</textarea>
                    </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</body>
</html>