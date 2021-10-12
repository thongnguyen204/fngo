@extends('layouts.user')

@section('content')


<body>
    <div class="container">
    <h1>Rooms</h1>
    <table class="table">
        <tr>
            <th >Room number</th>
            <th>Type</th>
            <th>Max person</th>
            <th>Price</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($rooms as $room)
    <tr>
        <td>{{$room->room_number}}</td>
        <td>{{$room->type->name}}</td>
        <td>{{$room->type->max_person}}</td>
        <td>{{$room->type->price_per_night}}</td>
        <td><a href="">details</a></td>
        <td>
            <form action="{{route('orderForm',$room)}}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Order</button>
            </form>
        </td>
    </tr>

    @endforeach
    </table>
    {{ $rooms->links() }}
    
</div>
</body>

@endsection