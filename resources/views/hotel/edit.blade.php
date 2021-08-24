@extends('layouts.admin')

@section('content')

<form action="{{route('hotel.update',$hotel->id)}}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="name">Name: </label></td>
            <td><input type="text" name="name" 
                value="{{$hotel->name}}"/></td>
        </tr>
        <tr>
            <td><label for="avg_price">Average price: </label></td>
            <td><input type="text" name="avg_price" 
                value="{{$hotel->price_avg}}"/></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Update</button></td>
        </tr>
    </table>
</form>
@endsection