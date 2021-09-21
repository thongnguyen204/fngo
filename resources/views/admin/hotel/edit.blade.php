@extends('layouts.admin')

@section('content')
<div class="container">
<form action="{{route('hotel.update',$hotel)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" value="{{$hotel->name}}" type="text" name="name"/>
    </div>
    <div class="form-group">
        <label for="avg_price">Average price: </label>
        <input class="form-control" value="{{$hotel->price_avg}}" type="text" name="avg_price" />
    </div>
        <button class="btn btn-primary" type="submit">Update</button>
</form>
</div>
@endsection