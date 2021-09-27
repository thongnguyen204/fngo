@extends('layouts.admin')
@section('content')

<body>
    <div class="container">
    

    <a href="{{route('tour.create',app()->getLocale())}}">Create tour</a>
    <table  class="table">
        <tr>
            <th>Title</th>
            <th>Price</th>
            
            <th></th>
            <th></th>
        </tr>
    @foreach ($trips as $trip)
    <tr>
        <td><a href="{{route('tour.show',[app()->getLocale(),$trip])}}">{{$trip->title}}</a></td>
        <td>{{$trip->price}}</td>
        
        <td><a href="{{route('tour.edit',[app()->getLocale(),$trip])}}">edit</a></td>
        <td>
            <form  action="{{route('tour.destroy',[app()->getLocale(),$trip])}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">{{__('common.Delete')}}</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $trips->links() }}
</div>
</body>
@endsection