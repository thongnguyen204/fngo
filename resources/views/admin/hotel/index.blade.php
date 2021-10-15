@extends('layouts.admin')
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">

<link href="{{ asset('css/hotel.css') }}" rel="stylesheet">

    <div style="max-width: 1300px;" class="container">
        
        <form action="{{route('hotel.index')}}" method="GET">
            <div class="input-group mb-3 searchBar">
                <input placeholder="{{__('hotel.Search')}}" type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                    placeholder="">
                <div class="input-group-append">
                    <button style="width: 100px" class="btn btn-search btn-outline-secondary" type="submit"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($hotels  as $hotel)
            <div class="card col-md-4">
                <div class="card-body">
                    <a href="{{route('hotel.show',$hotel)}}">
                        <img loading="lazy" alt="hotek Image" class="img_fluid rounded pictrure"
                            src="{{$hotel->avatar}}">
                    </a>
                </div>
                <div class="card-body hotel-info">
                    <div class="row">
                        <a href="{{route('hotel.show',$hotel)}}">
                            <div class="col-md-12 hotel-name-index">{{$hotel->name}}</div>
                        </a>
                    </div>

                    <div class="row" >
                        <div class="col-6 col-sm-6 col-md-12 col-lg-6">
                            <i class="bi bi-geo-alt-fill"></i>
                            {{$hotel->CityProvince->name}}
                        </div>
                        <div id="money" class="float-right col-6 col-sm-6 col-md-12 col-lg-6">
                            <div class="float-right" style="width: 130px">{{$hotel->money($hotel->price)}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $hotels->links() }}
    </div>

@endsection