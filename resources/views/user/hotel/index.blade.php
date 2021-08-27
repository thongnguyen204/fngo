@extends('layouts.user')
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
    <h1>Hotels</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Average price</th>
            
        </tr>
    @foreach ($hotels as $hotel)
    <tr>
        <td><a href="{{route('hotel.show',$hotel)}}">{{$hotel->name}}</a></td>
        <td>{{$hotel->price_avg}}</td>
        
        
    </tr>
            {{-- {{$hotel->name}} - Gia trung binh: {{$hotel->price_avg}} --}}
            {{-- <a href="{{route('users.edit',$user->id)}}">edit</a>
            <form style="" action="{{route('user.destroy',$user->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form> --}}
        
    @endforeach
    </table>
    {{ $hotels->links() }}
</body>
</html>
@endsection