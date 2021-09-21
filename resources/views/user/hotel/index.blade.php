@extends('layouts.admin')
@section('content')

<body>
    <div class="container">
        <h1>Hotels</h1>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Average price</th>
            </tr>
        @foreach ($hotels as $hotel)
        <tr>
            <td><a href="{{route('hotel.show',$hotel)}}">{{$hotel->name}}</a></td>
            <td>{{$hotel->price_avg}}</td>
        </tr>
        @endforeach
        </table>
        {{ $hotels->links() }}
    </div>
</body>
@endsection