@extends('layouts.admin')
@section('content')

<body>
    <h1>{{$tour->title}}</h1>
    <div>{{$tour->content}}</div>
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