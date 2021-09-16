@extends('layouts.admin')

@section('content')


<body>
    <h1>Hotels</h1>
    <a href="{{route('hotel.create')}}">Add hotel</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Average price</th>
            <th></th>
        </tr>
    @foreach ($hotels as $hotel)
    <tr>
        <td><a href="{{route('hotel.show',$hotel->id)}}">{{$hotel->name}}</a></td>
        <td>{{$hotel->price_avg}}</td>
        <td><a href="{{route('hotel.edit',$hotel->id)}}">edit</a></td>
        <td>
            <form action="{{route('hotel.destroy',$hotel)}}" method="POST">
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
    {{ $hotels->links() }}
</body>

@endsection