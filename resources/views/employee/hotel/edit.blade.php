@extends('layouts.admin')

@section('content')
<div class="container">
<form action="{{route('hotel.update',$hotel)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">{{__('hotel.Name')}} </label>
        <input class="form-control" value="{{$hotel->name}}" type="text" name="name"/>
    </div>

    <div class="form-group">
        <label for="price">Average price: </label>
        <input class="form-control" value="{{$hotel->price}}" type="number" name="price" />
    </div>

    <div class="form-group row">
        <div class="col-md-8">
            <label for="address">Address </label>
            <input class="form-control" value="{{$hotel->address}}" type="text" name="address" />
        </div>
        <div class="col-md-4">
            <label for="cityProvince">Province / City</label>
            <select class="form-control" id="cityProvince">
                @foreach ($cty_province as $cityProvince)
                    <option @if ($hotel->CityProvince->name == $cityProvince->name)
                        selected
                    @endif>{{$cityProvince->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group ">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="avatar" value="" >
            <label class="custom-file-label" for="customFile">{{__('common.Choose avatar')}}</label>
            @if ($errors->has('avatar'))
                @foreach ($errors->get('avatar') as $error)
                    <div class="col-md-12">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </div>



        <button class="btn btn-primary" type="submit">Update</button>
</form>
</div>
@endsection