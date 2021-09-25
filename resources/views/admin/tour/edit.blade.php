@extends('layouts.admin')

@section('content')

<script src="{{ asset('js/tourEdit/script.js') }}" defer></script>
<body>
    <h1>edit tour</h1>
    
    
    <form action="{{route('tour.update',$tour)}}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="title">Title </label></td>
                <td>
                    <input type="text" value="{{$tour->title}}" name="title" size="40"/>
                    <input type="hidden" value="{{$tour->subTour->count()}}" name="day_number" id="day_number"/>
                </td>
            </tr>

            <tr>
                <td><label for="price">Price </label></td>
                <td>
                    <input type="text" value="{{$tour->price}}" name="price" size="40"/>
                </td>
            </tr>
            
            <tr>
                <td><label for="content">Content </label></td>
                <td><textarea  name="content" rows="10" cols="50">{{$tour->content}}</textarea></td>
            </tr>
        </table>
        <h2>Sub Trip</h2>
        <div id="day">
            @foreach ($tour->subTour as $subTrip)
            <table id="{{$subTrip->day}}">
                <tr>
                    <td><label for="title">Title </label></td>
                    <td>
                        <input type="text" value="{{$subTrip->title}}" name="subTripTitle[{{$subTrip->day}}]" size="40"/>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="content">Content </label></td>
                    <td><textarea  name="subTripContent[{{$subTrip->day}}]" rows="10" cols="50">{{$subTrip->content}}</textarea></td>
                </tr>
            </table>
            @endforeach
        </div>
        <button type="button" id="addDayEdit">Add</button>
        <button type="button" id="removeDayEdit">Remove</button>
        <button type="submit">update</button>
    </form>
</body>

@endsection