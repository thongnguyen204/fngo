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
    <a href="{{route('hotel.create')}}">Add hotel</a>
    <table style="border-spacing: 10px">
        <tr>
            <th style="margin-right: 50px">Name</th>
            <th>Average price</th>
            <th></th>
        </tr>
    @foreach ($hotels as $hotel)
    <tr style = 'text-align:center'>
        <td><a href="{{route('room.show',$hotel->id)}}">{{$hotel->name}}</a></td>
        <td>{{$hotel->price_avg}}</td>
        <td><a href="{{route('hotel.edit',$hotel->id)}}">edit</a></td>
        <td>
            <form action="{{route('hotel.destroy',$hotel->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </td>
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
    
</body>
</html>