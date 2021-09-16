@extends('layouts.user')
@section('content')

<body>
    <h1>Tours</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Content</th>

        </tr>
    @foreach ($trips as $trip)
    <tr>
        <td><a href="{{route('tour.show',$trip)}}">{{$trip->title}}</a></td>
        <td>{{$trip->price}}</td>
        <td>{{$trip->content}}</td>
        <td>
            <form action="{{route('TourAddCart',$trip)}}" method="GET">
                @csrf
                <button type="submit">Add Cart</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $trips->links() }}
</body>
@endsection