@extends('layouts.user')
@section('content')

<body>
    <h1>Tours</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
        </tr>
    @foreach ($trips as $trip)
    <tr>
        <td><a href="{{route('tour.show',$trip)}}">{{$trip->title}}</a></td>
        <td>{{$trip->content}}</td>
    </tr>
    @endforeach
    </table>
    {{ $trips->links() }}
</body>
@endsection