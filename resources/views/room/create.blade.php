@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room create</title>
</head>
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
                    <select name="hotel_id" size="1">
                        @foreach ($hotels
                         as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                        @endforeach
                      </select>
                      
            </tr>
            <tr>
                <td><label for="type">Type: </label></td>
                <td><input type="text" name="type" 
                    /></td>
            </tr>
            <tr>
                <td><label for="max_person">Max person: </label></td>
                <td><input type="text" name="max_person" 
                    /></td>
            </tr>
            <tr>
                <td><label for="price_per_night">Price per night: </label></td>
                <td><input type="text" name="price_per_night" 
                    /></td>
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
</html>
@endsection