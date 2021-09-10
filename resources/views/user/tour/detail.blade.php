@extends('layouts.user')
@section('content')

<body>
    <h1>subtrip</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
        </tr>
    @foreach ($trip as $subtrip)
    <tr>
        <td><a href="{{route('tour.show',$subtrip)}}">{{$subtrip->title}}</a></td>
        <td>{{$subtrip->content}}</td>
    </tr>
    @endforeach
    </table>
    
@endsection